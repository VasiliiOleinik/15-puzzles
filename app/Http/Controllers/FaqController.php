<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Cache;
use Auth;

class FaqController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Cache::remember('question', now()->addDay(1), function(){
                return Question::all();
        });
        $user = Auth::user();
        return view('faq.faq', compact(['questions', 'user']));
    }
}
