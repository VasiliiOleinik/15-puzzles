<?php

namespace App\Http\Controllers;

use App\Models\Factor\Factor;


//use App\Models\Type;
use App\Models\Factor\FactorLanguage;
use App\Models\Method;
use App\Models\PageLang;
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
        $page = PageLang::with('page')
            ->where('pages_id', 2)
            ->first();

        $type1 = Type::with('factors', 'typesLang')
            ->limit(3)
            ->get();

        $type2 = Type::with('factors', 'typesLang')
            ->limit(3)
            ->offset(3)
            ->get();

        return view(
            'factor-diagram.factor-diagram',
            compact(
                'type1',
                'type2',
                'page'
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

    public function showLaboratory(Request $request)
    {
        $laboratory = Method::find($request->id);
        if(isset($laboratory)){

            return view('main.table_labs', ['labs'=>$laboratory->laboratories]);
        }

        return trans('main.error_find');
    }
}
