<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article\Article;
use App\Models\Category\CategoryForNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        dd((int)Article::count()-1);
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
            $articles_id = array();                
            $tags = Tag::with('articles')->whereIn('id',$request->tagsActive)->get();              
            foreach($tags as $tag){
                foreach($tag->articles as $obj) {
                    array_push($articles_id, $obj->id);
                }               
            }
            $articlesWithTags = Article::with('tags')->whereIn('id',$articles_id)->get()->pluck('id')->toArray();               
        }
        //Выбраны категории
        if($request->categoriesForNewsActive){
        
            $categoriesForNewsActive = $request->categoriesForNewsActive;

            $articlesWithCategoriesForNews = Article::with('categoriesForNews')->whereHas(
                'categoriesForNews', function ($query) use ( $categoriesForNewsActive ) {
                $query->whereIn('category_for_news_id', $categoriesForNewsActive);
            })->get()->pluck('id')->toArray();
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

    //Тэги, которые использовались в статьях
    public function usedTags(){

        $tag_with_articles = array();
        $tags = Tag::with('articles')->get();

        //find tags which have some relations with articles
        foreach($tags as $tag) {

            if(count($tag->articles) > 0){
                array_push($tag_with_articles, $tag->id);
            }
        }

        $tags_names = Tag::with('articles')->whereIn('id',$tag_with_articles)->pluck('name','id')->toJson();

        return response($tags_names);
    }
}
