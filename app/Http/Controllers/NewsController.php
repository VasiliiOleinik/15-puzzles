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
                //$tags = Tag::where('id','=', 32)->get();
                $tags = Tag::whereIn('id',$request->tags_id)->get();
                foreach($tags as $tag){
                    $tag_articles = $tag->articleTags;

                    foreach($tag_articles as $obj) {
                        array_push($articles_id, $obj->article_id);
                    }
                
                }
                $articles = Article::whereIn('id',$articles_id)->get();
            }
            else{
                $articles = Article::all();
            }

            return view('news\_news_partial', compact(['articles']));
        }
        else{
            $articles = Article::all();

            return view('news\news', compact(['articles']));
        }
    }

    public function used_tags(){

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
