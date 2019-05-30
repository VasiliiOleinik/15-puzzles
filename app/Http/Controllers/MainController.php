<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\Permission;

use App\Models\Piece\Piece;
use App\Models\Protocol;
use App\Models\Remedy;
use App\Models\Marker;


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
    public function index(\Illuminate\Http\Request $request)
    {
        $user = $request->user();
        $role = null;
        $role_permissions = null;
        $permissions = array();
        $protocols = Protocol::all();

        $pieces = Piece::all();
//        $piece = Piece::where('id','=',1)->first();
//        $piece_protocols = $piece->pieceProtocols;
//        foreach($piece_protocols as $obj) {
//            var_dump($obj->protocol_id);
//        }
//        die();
        if($user){

            $user = User::where('id','=',$user->id)->first();
            $role = $user->role;
            $role_permissions = $role->rolePermissions;

            foreach($role_permissions as $obj){
                array_push( $permissions, Permission::find($obj->permission_id) );
            }
        }

        return view('main', compact(['role','role_permissions', 'permissions', 'pieces', 'protocols']));
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

    public function protocols_content(Request $request)
    {
        $result = "";
        if($request['_active_pieces_id']){
            $_active_pieces_id = $request['_active_pieces_id'];            

            $protocols = array();
            foreach($_active_pieces_id as $piece_id){
                $piece = Piece::where('id','=',$piece_id)->first();
                $piece_protocols = $piece->pieceProtocols;            
                foreach($piece_protocols as $obj) {
                     array_push($protocols,  Protocol::find($obj->protocol_id) );
                }
            }

            $result = $protocols;
        }else{

            $protocols = Protocol::all();
            $result = $protocols;
        }

        return $result;
    }

    public function remedies_content(Request $request)
    {
        $result = "";
        if($request['_active_pieces_id']){
            $_active_pieces_id = $request['_active_pieces_id'];            

            $remedies = array();
            foreach($_active_pieces_id as $piece_id){
                $piece = Piece::where('id','=',$piece_id)->first();
                $piece_remedies = $piece->pieceRemedies;            
                foreach($piece_remedies as $obj) {
                     array_push($remedies,  Remedy::find($obj->remedy_id) );
                }
            }

            $result = $remedies;
        }
        /*else{

            $remedies = Remedy::all();
            $result = $remedies;
        }*/

        return $result;
    }

    public function markers_content(Request $request)
    {
        $result = "";
        if($request['_active_pieces_id']){
            $_active_pieces_id = $request['_active_pieces_id'];            

            $markers = array();
            foreach($_active_pieces_id as $piece_id){
                $piece = Piece::where('id','=',$piece_id)->first();
                $piece_markers = $piece->pieceMarkers;            
                foreach($piece_markers as $obj) {
                     array_push($markers,  Marker::find($obj->marker_id) );
                }
            }

            $result = $markers;
        }
        /*else{

            $markers = Marker::all();
            $result = $markers;
        }*/

        return $result;
    }

    public function details_content(Request $request)
    {
        $result = "";
        if($request['id']){

            $id = $request['id'];            
            $model = Protocol::find($id);

            $result = $model;
        }

        return $result;
    }

}
