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
        $factors = Piece::with('category')->get();
        $diseases = Disease::all();
        $protocols = Protocol::with('evidence')->get();
        $remedies = Remedy::all();
        $markers = Marker::with('methods')->get();
        $methods = Method::all();
        $newsLatest = Article::orderBy('updated_at','desc')->paginate(3);

        $data = [
            'factors', 'diseases', 'protocols', 'remedies', 'markers', 'methods',
            'newsLatest'
        ];
        return view('main.main', compact($data));
    }

    public function filter(Request $request)
    {
        $models = $request['models'];
        $filters = ['protocol','piece','disease'];

        $result = [];
        foreach ($models as $model)
        {
            $modelResults = [];
            $modelIdArray = [];
            $modelName = $this->getModelNameLowercase($model);

            foreach ($filters as $filter)
            {
                if($request[$filter]){
                    if($modelName != $filter ){
                        if (count($request[$filter]) > 0) {

                            $model_elements = $model::with([
                                $filter.'s' => function ($query) use ($request, $filter) {
                                    $query->whereIn($filter.'_id', $request[$filter]);
                                }
                            ]);
                            if (count($modelIdArray) > 0) {
                                $model_elements = $model_elements->whereIn('id', $modelIdArray)->get();
                                $modelIdArray = [];
                            } else {
                                $model_elements = $model_elements->get();
                            }

                            foreach ($model_elements as $element) {
                                if (count($element[$filter.'s']) == count($request[$filter])) {

                                    array_push($modelIdArray, $element->id);
                                }
                            }
                        }
                    }
                }
            }

            $modelResults = $model::whereIn('id',$modelIdArray)->get();
            $result[$modelName] = $modelResults;
        }

        $result = json_encode(["models" => $result]);

        return $result;
    }

    public function getModelNameLowercase($model){
        return strtolower(substr($model, strrpos($model, '\\') + 1));
    }

    public function evidences()
    {      
        return Evidence::all();
    }

    public function details(Request $request)
    {
        if($request['id'] && $request['model']){
            return $request['model']::find($request['id']);                    
        }
        return "";
    }

    public function protocol_pieces(Request $request)
    {
        $result = "";

        if($request['id']){
            $protocol_id = $request['id'];

            $protocol = Protocol::find($protocol_id);
            $protocol_pieces = $protocol->pieceProtocols;

            $pieces_id = array();

            foreach($protocol_pieces as $obj) {
                array_push($pieces_id, $obj->piece_id);
            }

            $result = $pieces_id;
        }

        return  $result;
    }

}
