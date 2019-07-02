<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\Permission;
use App\Models\Piece\Piece;
use App\Models\Piece\PieceRemedy;
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
            'piece',
            now()->addDay(1),
            function(){
                return Piece::with('category')->get();
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

        $data = [
            'factors', 'diseases', 'protocols', 'remedies', 'markers', 'methods',
            'newsLatest'
        ];
        return view('main.main', compact($data));
    }

    public function filter(Request $request)
    {
        $json = [];

        $modelPiece = "App\\Models\\Piece\\Piece";
        $modelDisease = "App\\Models\\Disease\\Disease";
        $modelProtocol = "App\\Models\\Protocol\\Protocol";
        $modelRemedy = "App\\Models\\Remedy";
        $modelMarker = "App\\Models\\Marker\\Marker";

        $models = [$modelPiece, $modelDisease, $modelProtocol, $modelRemedy, $modelMarker];

        foreach ($models as $model) {

            $table = $this->getModelNameLowercase($model);
            if(!$request['piece'] && !$request['disease'] && !$request['protocol']){
                $modelResults = Cache::get($table);
                $json[$table] = $modelResults;
            }else {

                $resultStartArray = $model::all()->pluck('id')->toArray();
                $withArray = ['piece', 'disease', 'protocol'];

                //фильтр по таблице не задан => ищем
                if (!$request[$table]) {
                    //проходим по всем фильтры: 'piece', 'disease', 'protocol'
                    foreach ($withArray as $with) {
                        //проверка чтобы имя таблицы и with() не совпадали
                        if ($with != $table) {
                            if ($request[$with]) {
                                $result = $this->withWhereIn($model, $with, $request[$with], $resultStartArray);
                                $resultStartArray = $this->getStartModelIdArray($with, $result, $request[$with]);
                            } else {
                                $result = $this->withWhereIn($model, $with, [], $resultStartArray);
                                $resultStartArray = $this->getStartModelIdArray($with, $result, []);
                            }
                        }
                    }
                    //фильтр по таблице задан => возвращаем значения фильтра
                } else {
                    $resultStartArray = $request[$table];
                }

                $modelResults = $model::whereIn('id', $resultStartArray)->get();
                $json[$table] = $modelResults;
            }
        }
        if($request['disease']){     
            return json_encode([
                                "models" => $json,
                                "diseasePieces" => Disease::with('pieces')
                                                          ->find($request['disease'][0])
                                                          ->pieces()->get()
                                                          ->pluck('id')->toArray()
                                ]);
        }else{
            return json_encode(["models" => $json]);
        }
    }    

    public function evidences()
    {      
        return Evidence::all();
    }

    public function markersPartial(Request $request)
    {        
        $markers = Marker::with('methods')->whereIn('id',$request->array)->get();      
        return view('main._partial.markers', compact(['markers']));
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
