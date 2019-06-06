<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('news', compact(['articles']));
    }
}
