<?php

namespace App\Http\Controllers;

use App\Models\Factor\Factor;


//use App\Models\Type;
use App\Models\Factor\FactorLanguage;
use App\Models\NameCols;
use App\Models\Page;
use App\Models\Method;
use App\Models\PageLang;
use App\Models\Type;
use App\Repository\FactorDiagramRepository;
use App\Scopes\LanguageScope;
use App\Service\HelperService;
use App\Service\Properties;
use Illuminate\Http\Request;

class FactorDiagramController extends Controller
{
    private $repository;

    public function __construct(FactorDiagramRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $page = Page::with('pageLang')->where('name_page', Properties::PAGE_FACTOR_DIAGRAM)->first();
        $colNames = NameCols::with('langCols')->first();
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
                'page',
                'colNames'
            )
        );
    }

    public function printRowAboutFactor(Request $request)
    {
        $factors = $this->repository->getProtocolsMarkers($request->id);
        $factors = HelperService::uniqFilteredData($factors, ['factors', 'protocols', 'markers']);

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
