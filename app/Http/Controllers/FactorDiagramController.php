<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactorDiagramController extends Controller
{
    public function index()
    {
    return view('factor-diagram.factor-diagram');
    }
}
