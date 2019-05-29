<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Protocol;
use App\Models\User\User;
use App\Models\Piece\Piece;

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

        return view('main', compact(['role','role_permissions', 'permissions', 'pieces']));
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
        if($request['_active_pieces_id']){
            $_active_pieces_id = $request['_active_pieces_id'];
        }else{
            $_active_pieces_id = "";
        }

        $result = $_active_pieces_id;
//            foreach ($pieces_result as $piece){
//
//                $piece_protocols = $piece->pieceProtocols;
//
//                $protocols = Protocol::where('id','=',$piece_protocols[0]->protocol_id);
//                for( $i = 1; $i < count($piece_protocols); $i++ ){
//
//                    $protocols->orWhere('id','=',$piece_protocols[i]->protocol_id);
//                }
//            }



        return $result;
    }

}
