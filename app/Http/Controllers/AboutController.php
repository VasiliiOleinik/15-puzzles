<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Factor\FactorLanguage;

class AboutController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $factors = Cache::remember(
            'factor_'.app()->getLocale(),
            now()->addDay(1),
            function(){
                return FactorLanguage::with('type')->get();
            }
        );
        return view('about.about', compact(['factors']));
    }
}
