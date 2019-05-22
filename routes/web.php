<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Response;

Route::get('/', function (\Illuminate\Http\Request $request) {
	 
	$user = $request->user();
	$role = null;
	$role_permissions = null;
	$permissions=array();

	if($user){
		$user = App\Models\User\User::where('id','=',$user->id)->first();
		$role = $user->role;		
		$role_permissions = App\Models\Role\RolePermission::where('role_id','=',$role->id)->get();

		foreach($role_permissions as $obj){
			 //var_dump($obj->permission_id)
			array_push( $permissions, App\Models\Permission::find($obj->permission_id) );
		}

	}
	
    return view('welcome', compact(['role','role_permissions', 'permissions']));
});

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
