<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AboutController extends Controller
{
    /**
     * Show the "about" page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $factors = Cache::remember(
            'factor',
            now()->addDay(1),
            function(){
                return Factor::with('type')->get();
            }
        );
        return view('about.about', compact(['factors']));
    }
}
