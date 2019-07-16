<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article\Article;
use App\Models\MemberCase;
use Illuminate\Support\Facades\DB; 

class SearchController extends Controller
{
    public function index(Request $request){
    $q = $request->input('q');
    $max_page = 15;
        $results = $this->search($q, $max_page);
        return view('search.index', [
            'results' => $results,
            'query' => $q,
        ])->render();
    }

    public function search($q, $count){       
        $articles = Article::where('title', 'like', "%".$q."%")
                          ->orWhere('description', 'like', "%".$q."%")
                          ->orWhere('content', 'like', "%".$q."%")
                          ->get();
        $memberCases = MemberCase::where('title', 'like', "%".$q."%")
                          ->orWhere('description', 'like', "%".$q."%")
                          ->orWhere('content', 'like', "%".$q."%")
                          ->get();
        $results = $memberCases->merge($articles);
        return $results;
    }
}
