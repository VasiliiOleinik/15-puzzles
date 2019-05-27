<?php

namespace App\Http\Controllers;

use App\Models\Permission;
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

}
