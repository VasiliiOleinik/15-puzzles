<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\Permission;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorRemedy;
use App\Models\Disease\Disease;
use App\Models\Protocol\Protocol;
use App\Models\Remedy;
use App\Models\Method;
use App\Models\Marker\Marker;
use App\Models\Article\Article;
use App\Models\Evidence;
use Illuminate\Support\Facades\Cache;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','verified']);
    }    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $newsLatest = Article::orderBy('updated_at','desc')->paginate(3);

        $factors = Cache::remember(
            'factor',
            now()->addDay(1),
            function(){
                return Factor::with('type')->get();
            }
        );

        $diseases = Cache::remember(
            'disease',
            now()->addDay(1),
            function(){
                return Disease::all();
            }
        );

        $protocols = Cache::remember(
            'protocol',
            now()->addDay(1),
            function(){
                return Protocol::with('evidence')->get();
            }
        );

        $remedies = Cache::remember(
            'remedy',
            now()->addDay(1),
            function(){
                return Remedy::all();
            }
        );

        $markers = Cache::remember(
            'marker',
            now()->addDay(1),
            function(){
                return Marker::with('methods')->get();
            }
        );

        $methods = Cache::remember(
            'methods',
            now()->addDay(1),
            function(){
                return Method::all();
            }
        );

        $evidences = Cache::remember(
            'evidences',
            now()->addDay(1),
            function(){
                return Evidence::all();
            }
        );

        $data = [
            'factors', 'diseases', 'protocols', 'remedies', 'markers', 'methods',
            'newsLatest'
        ];
        return view('main.main', compact($data));
    }

    public function filter(Request $request)
    {
        $json = [];

        $modelFactor = "App\\Models\\Factor\\Factor";
        $modelDisease = "App\\Models\\Disease\\Disease";
        $modelProtocol = "App\\Models\\Protocol\\Protocol";
        $modelRemedy = "App\\Models\\Remedy";
        $modelMarker = "App\\Models\\Marker\\Marker";

        $models = [$modelFactor, $modelDisease, $modelProtocol, $modelRemedy, $modelMarker];

        foreach ($models as $model) {

            $table = $this->getModelNameLowercase($model);
            if(!$request['factor'] && !$request['disease'] && !$request['protocol']){
                $modelResults = Cache::get($table);
                $json[$table] = $modelResults;
            }else {

                $resultStartArray = Cache::get($table)->pluck('id')->toArray();
                $withArray = ['factor', 'disease', 'protocol'];

                //фильтр по таблице не задан => ищем
                if (!$request[$table]) {
                    //проходим по всем фильтры: 'factor', 'disease', 'protocol'
                    foreach ($withArray as $with) {
                        //проверка чтобы имя таблицы и with() не совпадали
                        if ($with != $table) {
                            if ($request[$with]) {
                                $result = $this->withWhereIn($model, $with, $request[$with], $resultStartArray);
                                $resultStartArray = $this->getStartModelIdArray($with, $result, $request[$with]);
                            }
                        }
                    }
                    //фильтр по таблице задан => возвращаем значения фильтра
                } else {
                    $resultStartArray = $request[$table];
                }

                //добавляем связанную таблицу
                if($table == "factor"){
                    $modelResults = $model::with('type')->whereIn('id', $resultStartArray)->get();    
                }else
                if($table == "protocol"){
                    $modelResults = $model::with('evidence')->whereIn('id', $resultStartArray)->get();    
                }else
                if($table == "marker"){
                    $modelResults = $model::with('methods')->whereIn('id', $resultStartArray)->get();    
                }else
                    $modelResults = $model::whereIn('id', $resultStartArray)->get();
                $json[$table] = $modelResults;
            }
        }
        if($request['disease']){     
            return ([
                                "models" => $json,
                                "diseaseFactors" => Disease::with('factors')
                                                          ->find($request['disease'][0])
                                                          ->factors()->get()
                                                          ->pluck('id')->toArray()
                                ]);
        }else
        {
            return (["models" => $json]);
        }
    }    

    public function evidences()
    {      
        return Evidence::all();
    }

    public function markersPartial(Request $request)
    {        
        $markers = Marker::with('methods')->whereIn('id',$request->array)->get();      
        return view('main.main-left.main-tabs.markers', compact(['markers']));
    }

    public $modelFactor = "App\\Models\\Factor\\Factor";
    public $modelDisease = "App\\Models\\Disease\\Disease";
    public $modelProtocol = "App\\Models\\Protocol\\Protocol";
    public $modelRemedy = "App\\Models\\Remedy";
    public $modelMarker = "App\\Models\\Marker\\Marker";

    public function modelPartial(Request $request)
    {        
        
        $report = new MainController();
        $result = $report->filter($request);        
        $_models = $result['models'];
        $tabActive = 0;
        $view = [];
        $counts = [];
        $views = [];
        $diseaseFactors = [];
        if(count($result) > 1){           
            $diseaseFactors = $result['diseaseFactors'];             
        }
        if ( count($_models['factor']) == Factor::count() &&
             count($_models['disease']) == Disease::count() &&
             count($_models['protocol']) == Protocol::count()) {

            return json_encode(['views' => $views, 'counts' => $counts, 'models' => $_models, 'diseaseFactors' => $diseaseFactors]);
        }else
        {            
            $models = [$this->modelFactor, $this->modelDisease, $this->modelProtocol, $this->modelRemedy, $this->modelMarker];
            foreach ($models as $model) {// example: 'App\\Models\\Protocol\\Protocol'
                $modelName = $this->getModelNameLowercase($model);// example: 'protocol'            
                $modelArray =  $result['models'][$modelName]->pluck('id')->toArray();

                if($modelName == 'factor') {
                    $modelName = 'factor';
                    $factors = $result['models']['factor'];
                }
                if($modelName == 'disease') {
                    $diseases = $result['models']['disease'];
                }
                if($modelName == 'protocol') {
                    $protocols = $result['models']['protocol'];
                }
                if($modelName == 'remedy') {
                    $modelName = 'remedie';
                    $remedies = $result['models']['remedy'];
                }
                if($modelName == 'marker') {
                    $markers = $result['models']['marker'];
                }
                     
                //${$modelName.'s'} = $model::whereIn('id',$modelArray)->get();
                //${$modelName.'s'} = $result['models'][$modelName];   
                $view[ $modelName ] = view('main.main-left.main-tabs.'.$modelName.'s', [ $modelName.'s' => ${$modelName.'s'} ] );
                $views[ $modelName ] = (string)$view[ $modelName ] ;
                $counts [ $modelName ] = ${$modelName.'s'}->count();
            }
        }
        return json_encode(['views' => $views, 'counts' => $counts, 'models' => $_models, 'diseaseFactors' => $diseaseFactors]);
    }

    public function getModelNameLowercase($model){
        return strtolower(substr($model, strrpos($model, '\\') + 1));
    }

    public function withWhereIn($model, $with, $array, $resultStartArray){
        if (count($array) > 0) {
            return $model::whereIn('id', $resultStartArray)->with($with.'s')->whereHas(
                $with.'s', function ($query) use ($with, $array) {
                $query->whereIn($with.'_id', $array);
            }
            )->get();
        } else {
            return $model::whereIn('id', $resultStartArray)->with($with.'s')->get();
        }
    }

    public function getStartModelIdArray($with, $result, $array)
    {
        $resultStartArray = [];
        foreach ($result as $element) {
            $matches = 0;
            if (count($element[$with.'s']) >= count($array)) {
                foreach ($element[$with.'s'] as $elem) {
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

}
