<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $categories = Cache::remember(
            'category',
            now()->addDay(1),
            function(){
                return Category::with('articles')->get();
            }
        );
        if($request->tags_id){
            if($request->tags_id != [null] ){
                $articles_id = array();                
                $tags = Tag::with('articles')->whereIn('id',$request->tags_id)->get();              
                foreach($tags as $tag){
                    foreach($tag->articles as $obj) {
                        array_push($articles_id, $obj->id);
                    }               
                }
                $articles = Article::with('tags')->whereIn('id',$articles_id)->paginate(4);               
            }
            else{
                $articles = Article::with('tags')->paginate(4);
            }
            return view('news.partial.articles', compact(['articles','categories']));
        }
        if($request->categoryId){
            $categoryActive = $request->categoryId;
            $articles = Article::where('category_id','=',$categoryActive)->paginate(4);
            return view('news.partial.articles', compact(['articles','categories', 'categoryActive']));
        }
        else{
            $articles = Article::paginate(4);
            return view('news.news', compact(['articles','categories']));
        }
    }

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
