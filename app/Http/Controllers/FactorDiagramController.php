<?php

namespace App\Http\Controllers;

use App\Models\Factor\Factor;


//use App\Models\Type;
use App\Models\Factor\FactorLanguage;
use App\Models\NameCols;
use App\Models\Page;
use App\Models\PageLang;
use App\Models\Type;
use App\Scopes\LanguageScope;
use App\Service\Properties;
use Illuminate\Http\Request;

class FactorDiagramController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $page = Page::with('pageLang')->where('name_page', Properties::PAGE_FACTOR_DIAGRAM)->first();
        $colNames = NameCols::with('langCols')->first();
        $type1 = Type::with('factors', 'typesLang')
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
                'type2',
                'page',
                'colNames'
            )
        );
    }

    public function printRowAboutFactor(Request $request)
    {
        $factors = FactorLanguage::whereIn('id', $request->id)->get();
        return view('factor-diagram.print_factor_row', compact('factors'));
    }

    public function showRelation(Request $request)
    {
        $factorLang = FactorLanguage::find($request->id)->factor;
    }
}
