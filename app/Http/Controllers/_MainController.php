<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\Permission;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;
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
     * @property string $modelFactor
     * @property string $modelDisease
     * @property string $modelProtocol
     * @property string $modelRemedy
     * @property string $modelMarker
    */
    public $modelFactor = "App\\Models\\Factor\\Factor";
    public $modelDisease = "App\\Models\\Disease\\Disease";
    public $modelProtocol = "App\\Models\\Disease\\Disease";
    public $modelRemedy = "App\\Models\\Remedy";
    public $modelMarker = "App\\Models\\Marker\\Marker";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {        
        $newsLatest = Article::orderBy('updated_at','desc')->paginate(3);
        /*$factors = Cache::remember('factor', now()->addDay(1), function(){
                return Factor::with('type')->get();
        });*/
        $factors = Cache::remember('factor_'.app()->getLocale(), now()->addDay(1), function(){
                return FactorLanguage::with('factor','type')->get();
        });
        $diseases = Cache::remember('disease_'.app()->getLocale(), now()->addDay(1), function(){
                return Disease::all();
        });
        $protocols = Cache::remember('protocol_'.app()->getLocale(), now()->addDay(1), function(){
                return Protocol::with('evidence')->get();
        });
        $remedies = Cache::remember('remedy_'.app()->getLocale(), now()->addDay(1), function(){
                return Remedy::all();
        });
        $markers = Cache::remember('marker_'.app()->getLocale(), now()->addDay(1), function(){
                return Marker::with('methods')->get();
        });
        $methods = Cache::remember('methods_'.app()->getLocale(), now()->addDay(1), function(){
                return Method::all();
        });
        $evidences = Cache::remember('evidences_'.app()->getLocale(), now()->addDay(1), function(){
                return Evidence::all();
        });

        $data = [
            'factors', 'diseases', 'protocols', 'remedies', 'markers', 'methods',
            'newsLatest'
        ];
        return view('main.main', compact($data));
    }

    /**
     * Main tabs filter
     *
     * @return JSON
     */
    public function filter(Request $request)
    {
        $json = [];
        $models = [$this->modelFactor, $this->modelDisease, $this->modelProtocol, $this->modelRemedy, $this->modelMarker];

        foreach ($models as $model) {

            $table = $this->getModelNameLowercase($model);
            //если фильтр не задан => берем значения таблиц из кэша
            if(!$request['factor'] && !$request['disease'] && !$request['protocol']){
                $modelResults = Cache::get($table.'_'.app()->getLocale());
                $json[$table] = $modelResults;
            }else {

                if($table == "protocol"){
                    $resultStartArray = $model::all()->pluck('id')->toArray()
                }else
                $resultStartArray = Cache::get($table.'_'.app()->getLocale())->pluck('id')->toArray();
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

    /**
     * Return array of rendered views and array of models data
     *
     * @return JSON
     */
    public function modelPartial(Request $request)
    {        
        
        $report = new MainController();
        $result = $report->filter($request);        
        $tabActive = 0;
        $view = [];
        $views = [];
        //$diseaseFactors = [];
        /*if(count($result) > 1){           
            $diseaseFactors = $result['diseaseFactors'];             
        }*/
        if ( count($result['models']['factor']) == Factor::count() &&
             count($result['models']['disease']) == Disease::count() &&
             count($result['models']['protocol']) == Protocol::count()) {

            return json_encode(['views' => $views,  'models' => $result['models']/*, 'diseaseFactors' => $diseaseFactors*/]);
        }else
        {            
            $models = [$this->modelFactor, $this->modelDisease, $this->modelProtocol, $this->modelRemedy, $this->modelMarker];
            foreach ($models as $model) {// example: 'App\\Models\\Protocol\\Protocol'
                $modelName = $this->getModelNameLowercase($model);// example: 'protocol'            
                $modelArray =  $result['models'][$modelName]->pluck('id')->toArray();

                if($modelName == 'remedy') {
                    $modelName = 'remedie';
                    $remedies = $result['models']['remedy'];
                }else{
                    ${$modelName.'s'} = $result['models'][$modelName];
                }
               
                $view[ $modelName ] = view('main.main-left.main-tabs.'.$modelName.'s', [ $modelName.'s' => ${$modelName.'s'} ] );
                $views[ $modelName ] = (string)$view[ $modelName ] ;
            }
        }
        return json_encode(['views' => $views, 'models' => $result['models']/*, 'diseaseFactors' => $diseaseFactors*/]);
    }

    /**
     * Return lowercase model name
     *
     * @return string
     */
    public function getModelNameLowercase($model){
        return strtolower(substr($model, strrpos($model, '\\') + 1));
    }

    /**
     * Filter model data
     *
     * @return model
     */
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
