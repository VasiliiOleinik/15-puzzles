<?php

namespace App\Http\Controllers;

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

     public function personal_cabinet()
    {
        //$articles = Article::all();

        return view('personal_cabinet');
    }
}
