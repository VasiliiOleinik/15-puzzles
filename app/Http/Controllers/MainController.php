<?php

namespace App\Http\Controllers;

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
        /*$diseases = Cache::remember('disease_'.app()->getLocale(), now()->addDay(1), function(){
                return Disease::all();
        });*/
        $diseases = Cache::remember('disease_'.app()->getLocale(), now()->addDay(1), function(){
                return DiseaseLanguage::with('disease')->get();
        });
        /*$protocols = Cache::remember('protocol_'.app()->getLocale(), now()->addDay(1), function(){
                return Protocol::with('evidence')->get();
        });*/
        $protocols = Cache::remember('protocol_'.app()->getLocale(), now()->addDay(1), function(){
                return ProtocolLanguage::with('protocol','evidence')->get();
        });
        //dd($this->modelFactor."Language");
        //dd($protocols->where('protocol_id','=', 1)->protocol );
        //dd($protocols->first()->protocol->url);
        //dd(Cache::get('protocol_'.app()->getLocale())->pluck('protocol_id')->toArray());
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
                $modelResults = Cache::get($table.'_'.$request['locale']);
                $json[$table] = $modelResults;
            }else {

                if($table == "factor" || $table == "disease" || $table == "protocol") {
                    $resultStartArray = Cache::get($table.'_'.$request['locale'])->pluck($table.'_id')->toArray();
                    //$resultStartArray = FactorLanguage::all()->pluck('factor_id')->toArray();
                }
                else{
                    $resultStartArray = Cache::get($table.'_'.$request['locale'])->pluck('id')->toArray();
                }
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

                $json[$table] = $resultStartArray;
            }
        }
        if($request['disease']){     
            return ([
                    "models" => $json,
                    /*"diseaseFactors" => Disease::with('factors')
                                                ->find($request['disease'][0])
                                                ->factors()->get()
                                                ->pluck('id')->toArray()*/
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
        //return $result;
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
            $models = [$this->modelFactorLanguage, $this->modelDiseaseLanguage, $this->modelProtocolLanguage, $this->modelRemedy, $this->modelMarker];
            foreach ($models as $model) {// example: 'App\\Models\\Protocol\\Protocol'
                $modelName = $this->getModelNameLowercaseWithoutLanguage($model);// example: 'protocol'

                 //добавляем связанную таблицу                
                if($modelName == "factor"){
                    ${'factors'} = $model::withoutGlobalScopes()->where('language','=',$request['locale'])->with($modelName,'type')->whereIn($modelName.'_id', $result['models'][$modelName])->get();    
                }else
                if($modelName == "disease"){
                    ${'diseases'} = $model::withoutGlobalScopes()->where('language','=',$request['locale'])->with($modelName)->whereIn($modelName.'_id', $result['models'][$modelName])->get();    
                }else
                if($modelName == "protocol"){
                    ${'protocols'} = $model::withoutGlobalScopes()->where('language','=',$request['locale'])->with($modelName,'evidence')->whereIn($modelName.'_id', $result['models'][$modelName])->get();    
                }else
                if($modelName == "remedy"){
                    $modelName = 'remedie';
                    ${'remedies'} = $model::withoutGlobalScopes()->whereIn('id', $result['models']['remedy'])->get();    
                }
                else
                if($modelName == "marker"){
                    ${$modelName.'s'} = $model::with('methods')->whereIn('id', $result['models'][$modelName])->get();    
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
     * Return lowercase model name without "Language"
     *
     * @return string
     */
    public function getModelNameLowercaseWithoutLanguage($model){
        $model = str_replace("Language","",$model);
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
