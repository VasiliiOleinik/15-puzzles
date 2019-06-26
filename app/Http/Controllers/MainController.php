<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\Permission;

use App\Models\Piece\Piece;
use App\Models\Piece\PieceRemedy;
use App\Models\Disease\Disease;
use App\Models\Protocol\Protocol;
use App\Models\Remedy;
use App\Models\Marker;
use App\Models\Evidence;

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
    
        $user = $request->user();
        $role = null;
        $role_permissions = null;
        $permissions = array();
        $protocols = Protocol::all();
        $countRemedies = Remedy::count();
        $countMarkers = Marker::count();

        $pieces = Piece::with('category')->get();
        $diseases = Disease::all();
        $pieces_and_diseases = array();
        array_push($pieces_and_diseases, $pieces);
        array_push($pieces_and_diseases, $diseases);

        if($user){

            $user = User::where('id','=',$user->id)->first();
            $role = $user->role;
            $role_permissions = $role->rolePermissions;

            foreach($role_permissions as $obj){
                array_push( $permissions, Permission::find($obj->permission_id) );
            }
        }

        
        /*
        $result = array();

        $request['piece'] = [1];
        $request['protocol'] = [106];

        $models = ['App\Models\Remedy'];
        $filters = ['piece','protocol'];

        foreach ($models as $model)
        {
            foreach ($filters as $filter)
            {
                if(count($request[$filter])>0){

                    $model_elements = $model::with([$filter.'s' => function ($query) use ($request,$filter) {
                                                $query->whereIn($filter.'_id', $request[$filter]); }]);
                    if(count($result) > 0){
                        $model_elements = $model_elements->whereIn('id',$result)->get();
                        $result = []; 
                    }
                    else{
                        $model_elements = $model_elements->get();
                    }
                      
                    foreach ($model_elements as $element)
                    {
                        if(count($element[$filter.'s']) == count($request[$filter]) ){
                        
                            array_push( $result, $element->id);

                            //display
                            echo "--------<br>";
                            echo "remedy id: ".$element->id;
                            foreach ($element[$filter.'s'] as $obj)
                            {
                                echo " / protocol id: ".$obj->id;                    
                            }
                            echo "--------<br>";
                        }
                    }
                }
            }
        }
        
        dd($result);
        */

        return view('main.main', compact(['role','role_permissions', 'permissions', 'pieces',
                                            'diseases', 'pieces_and_diseases', 'protocols',
                                            'countRemedies', 'countMarkers']));
    }

    public function filter(Request $request)
    {
        $result_models = array();
        $result_id_array = array();

        $model = $request['model'];
        $filters = ['protocol','piece','disease'];

        //foreach ($models as $model)
        {
            foreach ($filters as $filter)
            {
                if($request[$filter]){
                    if(count($request[$filter])>0){

                        $model_elements = $model::with([$filter.'s' => function ($query) use ($request,$filter) {
                                                $query->whereIn($filter.'_id', $request[$filter]); }]);
                        if(count($result_id_array) > 0){
                            $model_elements = $model_elements->whereIn('id',$result_id_array)->get();
                            $result_id_array = []; 
                        }
                        else{
                            $model_elements = $model_elements->get();
                        }

                        foreach ($model_elements as $element)
                        {
                            if(count($element[$filter.'s']) == count($request[$filter]) ){

                                array_push( $result_id_array, $element->id);
                            }
                        }
                    }
                }
            }
        }
       
        $result_models = $model::whereIn('id',$result_id_array)->get();

        return $result_models;
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
