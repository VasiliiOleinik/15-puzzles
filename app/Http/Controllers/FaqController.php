<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User\User;
use Illuminate\Support\Facades\Cache;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\LetterToEditor;
use Illuminate\Support\Facades\Config;

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

    /**
     * Sends letter to editor.
     *
     * @param  \Illuminate\Http\Request $request
     * @return redirect
     */
    public function letter(Request $request)
    {        
        Mail::to( Config::get('puzzles.admin_email') )->send(new LetterToEditor($request));
        return redirect()->back();
    }
}
