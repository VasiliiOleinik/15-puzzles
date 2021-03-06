<?php

namespace App\Http\Controllers;

use App\Models\Book\Book;
use App\Models\Book\BookLanguage;
use App\Models\Group;
use App\Models\Page;
use App\Models\PageLang;
use App\Models\Police\Police;
use App\Models\User\User;
use App\Models\Permission;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;
use App\Models\Factor\FactorRemedy;
use App\Models\Disease\Disease;
use App\Models\Disease\DiseaseLanguage;
use App\Models\Protocol\Protocol;
use App\Models\Protocol\ProtocolLanguage;
use App\Models\Remedy;
use App\Models\RemedyLanguage;
use App\Models\Method;
use App\Models\MethodLanguage;
use App\Models\Marker\Marker;
use App\Models\Marker\MarkerLanguage;
use App\Models\Article\Article;
use App\Models\Article\ArticleLanguage;
use App\Models\Evidence;
use App\Repository\FilterMainPageRepository;
use App\Repository\LaboratoryRepository;
use App\Service\FilterMainPageService;
use App\Service\LaboratoryService;
use App\Service\PazzlesService;
use App\Service\Properties;
use Illuminate\Support\Facades\Cache;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Laboratory\Laboratory;
use Illuminate\Database\Eloquent\Builder;

//use GMaps;

class MainController extends Controller
{
    /**
     * @property string $modelFactor
     * @property string $modelDisease
     * @property string $modelProtocol
     * @property string $modelRemedy
     * @property string $modelMarker
     * @property string $modelFactorLanguage
     * @property string $modelDiseaseLanguage
     * @property string $modelProtocolLanguage
     * @property string $modelRemedyLanguage
     * @property string $modelMarkerLanguage
     */
    public $modelFactor = "App\\Models\\Factor\\Factor";
    public $modelDisease = "App\\Models\\Disease\\Disease";
    public $modelProtocol = "App\\Models\\Protocol\\Protocol";
    public $modelRemedy = "App\\Models\\Remedy";
    public $modelMarker = "App\\Models\\Marker\\Marker";
    public $modelFactorLanguage = "App\\Models\\Factor\\FactorLanguage";
    public $modelDiseaseLanguage = "App\\Models\\Disease\\DiseaseLanguage";
    public $modelProtocolLanguage = "App\\Models\\Protocol\\ProtocolLanguage";
    public $modelRemedyLanguage = "App\\Models\\RemedyLanguage";
    public $modelMarkerLanguage = "App\\Models\\Marker\\MarkerLanguage";
    private $repository;
    private $service;
    private $laboratoryRepository;
    private $laboratoriService;
    private $pazzlesService;

    const FILTER_BY_FACTOR = 'factor';
    const FILTER_BY_DISEASE = 'disease';
    const FILTER_BY_PROTOCOL = 'protocol';


    public function __construct(FilterMainPageRepository $repository,
                                FilterMainPageService $service,
                                LaboratoryRepository $laboratoryRepository,
                                LaboratoryService $laboratoriService,
                                PazzlesService $pazzlesService
    )
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->laboratoryRepository = $laboratoryRepository;
        $this->laboratoriService = $laboratoriService;
        $this->pazzlesService = $pazzlesService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {


        $page = Page::with('pageLang')->where('name_page', Properties::PAGE_MAIN)->first();

        $newsLatest = Cache::remember('newsLatest_' . app()->getLocale(), now()->addDay(1), function () {
            $latest = Article::orderBy('id', 'desc')->paginate(3)->pluck('id');
            return ArticleLanguage::with('article')->whereIn('article_id', $latest)
                ->orderBy('id', 'desc')->paginate(3);
        });
        $factors = FactorLanguage::with('factor.type')->get();
        $diseases = DiseaseLanguage::with('disease')->get();
        $protocols = ProtocolLanguage::with('protocol.evidence')->get();
        $remedies = RemedyLanguage::with('remedy')->get();
        $markers = MarkerLanguage::with('marker.methods.methodLanguage')->get();
        $markerMethods = $markers;
        $methods = MethodLanguage::with('method')->get();
        $evidences = Evidence::all();
        $countries = Country::all();
        $laboratories = Laboratory::all();
        $typeFactors = $this->pazzlesService->chunkCollect(Group::all());
        $pagePolicy = Police::find(2);
        //$map = $this->initMap($laboratories);
        //$mapJs = $map['js'];
        $lits = BookLanguage::with('book')
            ->latest('id')
            ->take(5)->get();
        $data = [
            'factors', 'diseases', 'protocols', 'remedies', 'markers', 'methods',
            'newsLatest', 'markerMethods', 'countries', 'lits', 'page', 'typeFactors','pagePolicy'
        ];
        return view('main.main', compact($data));
    }

    /**
     * @param $laboratories
     * @param null $countryName
     * @param null $method
     * @return mixed
     */
    public function initMap($laboratories, $countryName = null, $method = null)
    {

        $config = array();
        $config['center'] = 'auto';
        $config['zoom'] = '2';
        $config['geocodeCaching'] = true;
        GMaps::initialize($config);

        if ($method) {
            $laboratories = $this->checkIfMethodInLaboratory($laboratories, $method);
        }
        foreach ($laboratories as $laboratory) {

            $marker['position'] = $laboratory->lat . ', ' . $laboratory->lng;//'47.09514, 37.54131';
            $marker['infowindow_content'] = $laboratory->name;
            GMaps::add_marker($marker);
        }
        return GMaps::create_map();

    }

    /**
     * @param $laboratories
     * @param $method
     * @return array
     */
    public function checkIfMethodInLaboratory($laboratories, $method)
    {
        $laboratoriesFilter = [];
        foreach ($laboratories as $laboratory) {
            $methods = $laboratory->methods()->get()->pluck('id')->toArray();
            if (in_array($method, $methods)) {
                array_push($laboratoriesFilter, $laboratory);
            }
        }
        return $laboratoriesFilter;
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function mapRefresh(Request $request)
    {
        app()->setLocale($request->local);
        $filteredData = $this->laboratoryRepository->findLaboratory($request->country, $request->methode);
        $validResponseArray = $this->laboratoriService->getValidResponseArray($filteredData);
        $validResponseArray['laboratoryTable'] = $this->laboratoriService->printTableLaboratories($filteredData);
        $json = json_encode($validResponseArray);
        return $json;
    }


    /**
     * @param Request $request
     * @return false|string
     */
    public function modelPartial(Request $request)
    {
        app()->setLocale($request->local);
        $resultFiltering = $this->repository->filter($request);
        $resultFilteringValidArray = $this->service->uniqFilteredData($resultFiltering);
        foreach ($this->service->getNameFilteringModels() as $item) {
            $modeIds= $resultFilteringValidArray[$item];
            $modelItems = $modeIds ? $this->repository->getModels($item, $modeIds) : false;
            $view[$item] = view
            (
               'main.main-left.main-tabs.' . $item,
                [$item => $modelItems]
            )->render();
            $views[$item] = $view[$item];
        }
        return json_encode(['views' => $views, 'models' => $resultFilteringValidArray]);
    }
}

