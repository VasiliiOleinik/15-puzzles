<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AboutController extends Controller
{
    public function index()
    {
        $factors = Cache::remember(
            'piece',
            now()->addDay(1),
            function(){
                return Piece::with('type')->get();
            }
        );
        return view('about.about', compact(['factors']));
    }
}
