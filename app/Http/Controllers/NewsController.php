<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article\Article;
use App\Models\Category\CategoryForNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        //категории для новостей
        $categoriesForNews = Cache::remember(
            'categoryForNews',
            now()->addDay(1),
            function(){
                return CategoryForNews::with('articles')->get();
            }
        );
        //Выбраны тэги
        if($request->tagsActive){
            if($request->tagsActive[0]) {
                $articles_id = array();
                $tags = Tag::with('articles')->whereIn('id', $request->tagsActive)->get();
                foreach ($tags as $tag) {
                    foreach ($tag->articles as $obj) {
                        array_push($articles_id, $obj->id);
                    }
                }
                $articlesWithTags = Article::with('tags')->whereIn('id', $articles_id)->get()->pluck('id')->toArray();
            }
        }
        //Выбраны категории
        if($request->categoriesForNewsActive){
            if(count($request->categoriesForNewsActive) > 0) {

                $categoriesForNewsActive = $request->categoriesForNewsActive;

                $articlesWithCategoriesForNews = Article::with('categoriesForNews')->whereHas(
                    'categoriesForNews', function ($query) use ( $categoriesForNewsActive ) {
                    $query->whereIn('category_for_news_id', $categoriesForNewsActive);
                })->get()->pluck('id')->toArray();
            }
        }
        //Выбраны тэги или категории
        if($request->categoriesForNewsActive || $request->tagsActive){
            //если переменные с массивами выбранных категорий/тэгов не существуют => мы их создаем пустыми []
            $variableNames = ['articlesWithCategoriesForNews', 'articlesWithTags'];
            foreach($variableNames as $variableName)
            if( !isset(${$variableName}) ){
                ${$variableName} = [];
            }

            //коллекция статей с учетом фильтра по категориям и тэгам                           
            $collection = array_unique(array_merge( $articlesWithCategoriesForNews, $articlesWithTags ));

            //если не выбраны ни категории, ни тэги => отображаем все статьи
            if( count($collection) > 0){
                $articles = Article::whereIn('id',$collection)->paginate(4);
            }else{
                $articles = Article::paginate(4);
            }       
            return view('news.news-left.main-content', compact(['articles']));
        }
        //пагинация
        if($request->page){
            $articles = Article::paginate(4);
            return view('news.news-left.main-content', compact(['articles']));
        }
        else{
            $articles = Article::paginate(4);
            return view('news.news', compact(['articles','categoriesForNews']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article\Article  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        //категории для новостей
        $categoriesForNews = Cache::remember(
            'categoryForNews',
            now()->addDay(1),
            function(){
                return CategoryForNews::with('articles')->get();
            }
        );
        return view('news.news-single', ['article' => Article::find($id),'categoriesForNews' => $categoriesForNews]);
    }

    /**
     * Return used tags.
     *
     * @return \Illuminate\Http\Response
     */
    //Тэги, которые использовались ($request->with должен содержать таблицу, связанную с тэгами. например 'articles')
    public function usedTags(Request $request){

        $tag_with = array();
        $tags = Tag::with($request->with)->get();

        //find tags which have some relations with articles
        foreach($tags as $tag) {

            if(count($tag[$request->with]) > 0){
                array_push($tag_with, $tag->id);
            }
        }

        $tags_names = Tag::with($request->with)->whereIn('id',$tag_with)->pluck('name','id')->toJson();

        return response($tags_names);
    }
}
