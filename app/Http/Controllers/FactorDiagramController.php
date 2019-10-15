<?php

namespace App\Http\Controllers;

use App\Models\Factor\Factor;


//use App\Models\Type;
use App\Models\Factor\FactorLanguage;
use App\Models\Type;
use App\Scopes\LanguageScope;
use Illuminate\Http\Request;

class FactorDiagramController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $type1= Type::with('factors', 'typesLang')
            ->limit(2)
            ->get();

        $type2 = Type::with('factors', 'typesLang')
            ->limit(2)
            ->offset(2)
            ->get();

        return view(
            'factor-diagram.factor-diagram',
            compact(
                'type1',
                'type2'
            )
        );
    }

    public function printRowAboutFactor(Request $request)
    {
        $factor = FactorLanguage::find($request->id);
//        foreach ($factor->factor->protocols as $protocol){
//            $protocols = $protocol->protocolLanguages;
//        }

        foreach ($factor->factor->markers as $marker){
            $markers = $marker->markerLanguage;
        }
        return view('factor-diagram.print_factor_row', compact('factor'));
    }
}
