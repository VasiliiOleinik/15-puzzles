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

        $pieces = Piece::all();
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

        return view('main', compact(['role','role_permissions', 'permissions', 'pieces', 'diseases', 'pieces_and_diseases', 'protocols']));
    }

    public function pieces_content(Request $request)
    {
        if($request['_active_pieces_id']){
            $_active_pieces_id = $request['_active_pieces_id'];
        }else{
            $_active_pieces_id = "";
        }
        $result = "";
        if( $_active_pieces_id != ""){
            
            $pieces = Piece::where('id','=',$_active_pieces_id[0]);

            for( $i = 1; $i < count($_active_pieces_id); $i++ ){
                $pieces->orWhere('id','=',$_active_pieces_id[$i]);
            }
            $result = $pieces->get();
        }else{
            $result = "";
        }
      
        
        return $result;
    }

    public function diseases_content(Request $request)
    {
        if($request['_active_pieces_id']){
            $_active_diseases_id = $request['_active_pieces_id'];
        }else{
            $_active_diseases_id = "";
        }
        $result = "";
        if( $_active_diseases_id != ""){
            
            $diseases = Disease::where('id','=',$_active_diseases_id[0]);

            for( $i = 1; $i < count($_active_diseases_id); $i++ ){
                $diseases->orWhere('id','=',$_active_diseases_id[$i]);
            }
            $result = $diseases->get();
        }else{
            $result = "";
        }
      
        
        return $result;
    }

    public function model_data_with_filters(Request $request)
    {
        $result_models = array();
        $result_ids = array();

        //$request['piece'] = [2,7];
        //$request['protocol'] = [190, 222];
        //return($request->all());
        //$models = [ $request['model'] ];
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
                        if(count($result_ids) > 0){
                            $model_elements = $model_elements->whereIn('id',$result_ids)->get();
                            $result_ids = []; 
                        }
                        else{
                            $model_elements = $model_elements->get();
                        }

                        foreach ($model_elements as $element)
                        {
                            if(count($element[$filter.'s']) == count($request[$filter]) ){

                                array_push( $result_ids, $element->id);
                            }
                        }
                    }
                }
            }
        }
       
        $result_models = $model::whereIn('id',$result_ids)->get();
        

        /*
        $result = '';
        $model_name = $request['model'];

        $model_name_without_namespace = explode('\\',$model_name)[count(explode('\\',$model_name))-1];
        $model_name_without_namespace_last_char = substr($model_name_without_namespace, -1);
        if($model_name_without_namespace_last_char == "y"){
            $model_name_without_namespace = substr_replace($model_name_without_namespace, "ie",-1);
        }

        $model = $model_name::all();

        $filters = ['piece','disease','protocol'];

        foreach ($filters as $filter) {

            if ($request['_active_'.$filter.'s_id']) {
                $_active_tag_type_ids = $request['_active_'.$filter.'s_id'];

                $target = null;
                $model_pieces = null;
                $count = 0;
                $model_eloquient = array();

                foreach ($model as $model_element) {
                    $method_relationship = $filter.$model_name_without_namespace.'s';
                    $model_relationship = $model_element[$method_relationship];
                    $count = 0;
                    foreach ($model_relationship as $obj) {

                        $target = $obj[$filter.'_id'];
                        foreach ($_active_tag_type_ids as $id) {

                            if ($id == $target) {
                                $count++;
                            }

                        }
                    }
                    if ($count == count($_active_tag_type_ids)) {
                        array_push($model_eloquient, $model_element);
                    }

                }
                $model = $model_eloquient;
            }
        }
    
        $result = $model;
        */

        return $result_models;
    }

    public function evidences_content()
    {
        $evidences = Evidence::all();
        $result = $evidences;
        
        return $result;
    }

    public function details_content(Request $request)
    {
        $result = "";
        if($request['id']){

            $id = $request['id'];
            
            if($request['table']){

                if($request['table'] == "protocols"){

                    $model = Protocol::find($id);

                    $result = $model;
                }
                if($request['table'] == "remedies"){

                    $model = Remedy::find($id);

                    $result = $model;
                }
                if($request['table'] == "markers"){

                    $model = Marker::find($id);

                    $result = $model;
                }
            }
            
        }

        return $result;
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
