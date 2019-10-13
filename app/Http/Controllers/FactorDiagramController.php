<?php

namespace App\Http\Controllers;

use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;
use App\Models\Type;
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
        $factorTypes = Type::with('factors')->get();
        return view('factor-diagram.factor-diagram',
            compact(
                'factorTypes'
            )
        );
    }
}
