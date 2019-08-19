<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article\ArticleLanguage;
use App\Models\MemberCase;
use Illuminate\Support\Facades\DB; 

class SearchController extends Controller
{
    public function index(Request $request){
        $q = $request->input('q');
        $max_page = 100;
        $results = $this->search($q, $max_page);
       // dd($results);
        $count = 0;
        foreach($results as $collection){
            $count += $collection->count();
        }
        return view('search.index', [
            'results' => $results,
            'count' => $count,
            'query' => $q,
        ])->render();
    }

    public function search($q, $count){
        $memberCases = MemberCase::where('title', 'like', "%".$q."%")
                          ->orWhere('description', 'like', "%".$q."%")
                          ->orWhere('content', 'like', "%".$q."%")
                          ->get();  
        if($q){            
            $articles = ArticleLanguage::withoutGlobalScopes()->where('title', 'like', "%".$q."%")
                          ->orWhere('description', 'like', "%".$q."%")
                          ->orWhere('content', 'like', "%".$q."%")
                          ->get();
        }else{
            $articles = ArticleLanguage::where('title', 'like', "%".$q."%")
                              ->orWhere('description', 'like', "%".$q."%")
                              ->orWhere('content', 'like', "%".$q."%")
                              ->get();
        }              
        $results = [];               
        array_push($results, $articles);
        array_push($results, $memberCases);
        return $results;
    }
}
