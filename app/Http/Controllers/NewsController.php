<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        if($request->tags_id){

            if($request->tags_id != [null] ){

                $articles_id = array();
                
                $tags = Tag::with('articles')->whereIn('id',$request->tags_id)->get();
                
                foreach($tags as $tag){

                    foreach($tag->articles as $obj) {
                        array_push($articles_id, $obj->id);
                    }
                
                }
                $articles = Article::with('tags')->whereIn('id',$articles_id)->get();
                
            }
            else{
                $articles = Article::with('tags')->get();
            }

            return view('news._news_partial', compact(['articles']));
        }
        else{
            $articles = Article::all();

            return view('news.news', compact(['articles']));
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
