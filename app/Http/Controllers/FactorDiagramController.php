<?php

namespace App\Http\Controllers;

use App\Models\Factor\Factor;
//use App\Models\Factor\FactorLanguage;
//use App\Models\Type;
use App\Models\Factor\FactorLanguage;
use Illuminate\Http\Request;

class FactorDiagramController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $factorsCollect1 = FactorLanguage::with('factor')
            ->limit(3)
            ->get();

        $factorsCollect2 = FactorLanguage::with('factor')
            ->limit(3)
            ->offset(3)
            ->get()

        ;

        return view('factor-diagram.factor-diagram',
            compact(
                'factorsCollect1',
                'factorsCollect2'
            )
        );
    }
}
