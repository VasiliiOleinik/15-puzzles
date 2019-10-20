<?php

namespace App\Http\Controllers;

use App\Models\Book\Book;
use App\Models\Book\BookLanguage;
use App\Models\PageLang;
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
use App\Service\FilterMainPageService;
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

    const FILTER_BY_FACTOR = 'factor';
    const FILTER_BY_DISEASE = 'disease';
    const FILTER_BY_PROTOCOL = 'protocol';

    /**
     * MainController constructor.
     * @param FilterMainPageRepository $repository
     * @param FilterMainPageService $service
     */
    public function __construct(FilterMainPageRepository $repository, FilterMainPageService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        $page = PageLang::with('page')->where('pages_id', 5)->first();


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
        //$map = $this->initMap($laboratories);
        //$mapJs = $map['js'];
        $lits = BookLanguage::with('book')
            ->latest('id')
            ->take(5)->get();
        $data = [
            'factors', 'diseases', 'protocols', 'remedies', 'markers', 'methods',
            'newsLatest', 'markerMethods', 'countries', 'lits', 'page'
        ];
        return view('main.main', compact($data));
    }

    /**
     * Initialize google maps
     *
     * @params integer[], string
     * @return obj
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
     * Check if method in laboratories
     *
     * @return []
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
     * Refresh map
     *
     * @return view
     */
    public function mapRefresh(Request $request)
    {
        $laboratories =  Laboratory::all();
        $country = null;
        if ($request['country']) {
            $country = Country::find($request['country']);
        }
        if ($request['method']) {
            $laboratories = $this->checkIfMethodInLaboratory($laboratories, $request['method']);
        }


        $json = ['laboratories' => $laboratories, 'country' => $country];
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
            );
            $views[$item] = (string)$view[$item];
        }
        return json_encode(['views' => $views, 'models' => $resultFilteringValidArray]);
    }
}

