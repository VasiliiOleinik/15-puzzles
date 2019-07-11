<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactorDiagramController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    return view('factor-diagram.factor-diagram');
    }
}
