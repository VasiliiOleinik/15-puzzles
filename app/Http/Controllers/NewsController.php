<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\TagLanguage;
use App\Models\Article\Article;
use App\Models\Article\ArticleLanguage;
use App\Models\Category\CategoryForNews;
use App\Models\Category\CategoryForNewsLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\LetterToSubscriber;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

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
            'categoryForNews_'.app()->getLocale(),
            now()->addDay(1),
            function(){
                return CategoryForNewsLanguage::with('categoriesForNews')->get();
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
                $articles = ArticleLanguage::with('article')->whereIn('article_id',$collection)
                                                            ->orderBy('article_id', 'DESC')->paginate(4);
            }else{
                $articles = ArticleLanguage::with('article')->orderBy('article_id', 'DESC')->paginate(4);
            }       
            return view('news.news-left.main-content', compact(['articles']));
        }
        //пагинация
        if($request->page){
            $articles = ArticleLanguage::with('article')->orderBy('article_id', 'DESC')->paginate(4);
            return view('news.news-left.main-content', compact(['articles']));
        }
        else{
            $articles = ArticleLanguage::with('article')->orderBy('article_id', 'DESC')->paginate(4);
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
            'categoryForNews_'.app()->getLocale(),
            now()->addDay(1),
            function(){
                return CategoryForNewsLanguage::with('categoriesForNews')->get();
            }
        );
        return view('news.news-single', ['article' => ArticleLanguage::where("article_id",'=',$id)->first(),'categoriesForNews' => $categoriesForNews]);
    }

    /**
     * Return used tags.
     *
     * @return \Illuminate\Http\Response
     */
    //Тэги, которые использовались ($request->with должен содержать таблицу, связанную с тэгами. например 'articles')
    public function usedTags(Request $request){

        if($request->all == "all"){            
            $tags_names = TagLanguage::where('language','=', app()->getLocale() )->get()->pluck('name','tag_id')->toJson();            
        }else
        {
            $tag_with = array();
            $tags = Tag::with($request->with)->get();

            //find tags which have some relations with model
            foreach($tags as $tag) {

                if(count($tag[$request->with]) > 0){
                    array_push($tag_with, $tag->id);
                }
            }
            if($request['with'] == "memberCases"){
                //$tags_names = Tag::with('memberCases')->whereIn('id',$tag_with)->whereHas(
                $tags_names = TagLanguage::whereIn('tag_id',$tag_with)->whereHas(                
                    'memberCases', function ($query) {
                        $query->where('status','=','show');
                    }
                )->pluck('name','tag_id')->toJson();
            }else{
                //$tags_names = Tag::with($request->with)->whereIn('id',$tag_with)->pluck('name','id')->toJson();
                $tags_names = TagLanguage::whereIn('tag_id',$tag_with)
                                         ->pluck('name','tag_id')->toJson();
            }
        }
        return response($tags_names);
    }

    public function tagsCloud(Request $request){
        //для input "add story tags" показываем все тэги
        if($request['with'] == "memberCases"){
            $tag_with = array();
            $tags = Tag::with($request->with)->get();

            //find tags which have some relations with model
            foreach($tags as $tag) {

                if(count($tag[$request->with]) > 0){
                    array_push($tag_with, $tag->id);
                }
            }
            /*$tags_names = Tag::with('memberCases')->whereIn('id',$tag_with)->whereHas(                
                'memberCases', function ($query) {
                    $query->where('status','=','show');
                }
            )->get();*/
            $tags_id = Tag::with('memberCases')->whereIn('id',$tag_with)->whereHas(                
                'memberCases', function ($query) {
                    $query->where('status','=','show');
                }
            )->get()->pluck('id');
            return view($request->view, ['tags' => TagLanguage::whereIn('tag_id',$tags_id)->get()]);
        }
        return view($request->view, ['tags' => TagLanguage::whereIn('tag_id',$request['tags'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function create(Request $request)
    {        
        $validatedData = $request->validate([
        'titleEng' => ['required', 'string', 'max:191'],
        'titleRu' => ['required', 'string', 'max:191'],
        'descriptionEng' => ['required', 'max:191'],
        'descriptionRu' => ['required', 'max:191'],  
        'contentEng' => ['required', 'max:64000'],
        'contentRu' => ['required', 'max:64000'],      
        'img' => ['nullable'],       
        ]);
        
        $articleLanguageEng = new ArticleLanguage;
        $articleLanguageRu = new ArticleLanguage;
        $article = new Article;
        //находим наивысшее значение id и ставим больше на 1
        $article->id = Article::orderBy('id', 'desc')->first()->id + 1;
        if($request->img != null){          
          $article->img = $request['img'];
        } 
        $article->save();
        if(array_key_exists("tags", $request->article)){
            $article->tags()->sync($request->article['tags']);
        }

        $articleLanguageEng->language = "eng";
        $articleLanguageEng->title = $request['titleEng'];
        $articleLanguageEng->description = $request['descriptionEng'];
        $articleLanguageEng->content = $request['contentEng'];
        $articleLanguageEng->article_id = $article->id;

        $articleLanguageRu->language = "ru";
        $articleLanguageRu->title = $request['titleRu'];
        $articleLanguageRu->description = $request['descriptionRu'];
        $articleLanguageRu->content = $request['contentRu'];
        $articleLanguageRu->article_id = $article->id;
        
        $articleLanguageEng->save();
        $articleLanguageRu->save();

        Cache::forget('newsLatest_eng');
        Cache::forget('newsLatest_ru');
        Cache::remember('newsLatest_eng', now()->addDay(1), function(){
                $latest = Article::orderBy('id','desc')->paginate(3)->pluck('id');
                return ArticleLanguage::withoutGlobalScopes()
                                      ->with('article')
                                      ->where('language','=','eng')
                                      ->whereIn('article_id',$latest)
                                      ->orderBy('article_id','desc')->paginate(3);
        });
        Cache::remember('newsLatest_ru', now()->addDay(1), function(){
                $latest = Article::orderBy('id','desc')->paginate(3)->pluck('id');
                return ArticleLanguage::withoutGlobalScopes()
                                      ->with('article')
                                      ->where('language','=','ru')
                                      ->whereIn('article_id',$latest)
                                      ->orderBy('article_id','desc')->paginate(3);
        });
        //рассылка подписчикам новой новости
        /*$subscribers = Subscriber::all();
        foreach($subscribers as $subscriber){
            Mail::to($subscriber->email)
            ->queue(new LetterToSubscriber(Cache::get('newsLatest_'.$subscriber->language)
                                                    ->take(1)));
        }*/
                                                    
        return Redirect::to('/admin/news/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id, Request $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function edit($id, Request $request)
    {
        $id = ArticleLanguage::find($id)->article_id;
        $article = Article::find($id);
        if($request->img != null){          
          $article->img = $request['img'];
        }
        $article->save();
        if(array_key_exists("tags", $request->article)){
            $article->tags()->sync($request->article['tags']);
        }

        Cache::forget('newsLatest_eng');
        Cache::forget('newsLatest_ru');

        if( $request->has("next_action") ){
            if($request['next_action'] == "save_and_continue"){
                return redirect()->back();
            }
            if($request['next_action'] == "save_and_create"){
                return redirect()->route('admin.model.create',['adminModel' => 'news']);
            }
        }        

        return Redirect::to('/admin/news/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = ArticleLanguage::find($id)->article_id;
        Article::find($id)->delete();
        Cache::forget('newsLatest_eng');
        Cache::forget('newsLatest_ru');
        return Redirect::to('/admin/news/');
    }
}
