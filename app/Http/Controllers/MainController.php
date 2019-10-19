<?php

namespace App\Http\Controllers;

use App\Models\Book\Book;
use App\Models\Book\BookLanguage;
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

    const FILTER_BY_FACTOR = 'factor';
    const FILTER_BY_DISEASE = 'disease';
    const FILTER_BY_PROTOCOL = 'protocol';

    /**
     * MainController constructor.
     * @param FilterMainPageRepository $repository
     */
    public function __construct(FilterMainPageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

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
            'newsLatest', 'markerMethods', 'countries', 'lits'
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
        $laboratories = Cache::remember('laboratory', now()->addDay(1), function () {
            return Laboratory::all();
        });
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
     * @return array
     */
    public function filter(Request $request): array
    {
        $filterResult = array();

        //$filterResult = $this->repository->filterByFactor([10,12]);


        $raw = <<<RAW
       factors.id                                                      as id,
       GROUP_CONCAT(DISTINCT fd.id ORDER BY fd.id)               as fd_disease,
       GROUP_CONCAT(DISTINCT dp.protocol_id ORDER BY dp.protocol_id) as protocols,
       GROUP_CONCAT(DISTINCT pm.marker_id ORDER BY pm.marker_id)    as markers,
       GROUP_CONCAT(DISTINCT pr.remedy_id ORDER BY pr.remedy_id )   as  remedy
RAW;
        $factor = Factor::selectRaw($raw)
            ->join('factor_diseases as fd', 'factors.id', 'fd.factor_id')
            ->join('disease_protocols as dp', 'fd.disease_id', 'dp.disease_id')
            ->join('protocol_markers as pm', 'dp.protocol_id', 'pm.protocol_id')
            ->join('protocol_remedies as pr', 'dp.protocol_id', 'pr.protocol_id')
            ->when($request->factor, function (Builder $query, $factor) {
                return $query->whereIn('factors.id', $factor);
            })
            ->when($request->disease, function (Builder $query, $disease) {
                return $query->whereIn('dp.disease_id', $disease);
            })
            ->when($request->protocol, function (Builder $query, $protocol) {
                return $query->whereIn('pm.protocol_id', $protocol);
            })
            ->groupBy(['factors.id'])
            ->get();


        $factorsProtocols = implode(',', $factor->pluck('protocols')->all());
        $factorsProtocols = explode(',', $factorsProtocols);
        $factorsProtocols = array_unique($factorsProtocols);
        return $filterResult;
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function modelPartial(Request $request)
    {
        $resultFiltering = $this->filter($request);
        $resultFiltering = $this->mergeCollect($resultFiltering);

        $tabActive = 0;
        $view = [];
        $views = [];


        foreach ($resultFiltering as $model) {
            $x = $model;
            //$view[$modelName] = view('main.main-left.main-tabs.' . $modelName . 's', [$modelName . 's' => ${$modelName . 's'}]);


        }
        return json_encode(['views' => $views, 'models' => $result['models']/*, 'diseaseFactors' => $diseaseFactors*/]);
    }

    /**
     * Return lowercase model name
     *
     * @return string
     */
    public function getModelNameLowercase($model)
    {
        return strtolower(substr($model, strrpos($model, '\\') + 1));
    }

    /**
     * Return lowercase model name without "Language"
     *
     * @return string
     */
    public function getModelNameLowercaseWithoutLanguage($model)
    {
        $model = str_replace("Language", "", $model);
        return strtolower(substr($model, strrpos($model, '\\') + 1));
    }

    /**
     * Filter model data
     *
     * @return model
     */
    public function withWhereIn($model, $with, $array, $resultStartArray)
    {
        if (count($array) > 0) {
            return $model::whereIn('id', $resultStartArray)->with($with . 's')->whereHas(
                $with . 's', function ($query) use ($with, $array) {
                $query->whereIn($with . '_id', $array);
            }
            )->get();
        } else {
            return $model::whereIn('id', $resultStartArray)->with($with . 's')->get();
        }
    }

    /**
     * Return 'with' model array
     *
     * @return int []
     */
    public function getStartModelIdArray($with, $result, $array)
    {
        $resultStartArray = [];
        foreach ($result as $element) {
            $matches = 0;
            if (count($element[$with . 's']) >= count($array)) {
                foreach ($element[$with . 's'] as $elem) {
                    if (in_array($elem->id, $array)) {
                        $matches++;
                    }
                }
                if ($matches >= count($array)) {
                    array_push($resultStartArray, $element->id);
                }
            }
        }
        return $resultStartArray;
    }

    public function mergeCollect(array $resultFiltering): array
    {
        $arr = array();
        $dr = array();
        foreach ($resultFiltering as $resultFiltering) {
            foreach ($resultFiltering as $key => $item) {
                $arr[$key][] = $item;
            }
        }
        foreach ($arr as $key => $item) {
            $dr[$key] = implode(',', array_unique($item));
        }
    }

}
/*
SELECT f.id                                                      id,
       GROUP_CONCAT(DISTINCT fd.id ORDER BY fd.id)               fd_deases,
       GROUP_CONCAT(DISTINCT dp.protocol_id ORDER BY dp.protocol_id) protocol,
       GROUP_CONCAT(DISTINCT pm.marker_id ORDER BY pm.marker_id)     marker,
       GROUP_CONCAT(DISTINCT pr.remedy_id ORDER BY pr.remedy_id )     remedy
FROM factors f
         join factor_diseases fd on f.id = fd.factor_id
         join disease_protocols dp
              on fd.disease_id = dp.disease_id
         join protocol_markers pm on dp.protocol_id = pm.protocol_id
         join protocol_remedies pr on dp.protocol_id = pr.protocol_id
WHERE f.id in (10, 12)
GROUP BY f.id

 * */
