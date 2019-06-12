<?php

namespace App\Http\Controllers;

use App\Models\Article\Article;
use Illuminate\Http\Request;

class PersonalCabinetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

     public function personal_cabinet(Request $request)
    {
    //$request->session()->reflash();
        $test = "test";

        return view('personal_cabinet', compact(['test']));
    }
}
