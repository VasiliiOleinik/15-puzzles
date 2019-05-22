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

use App\Models\User\User;
use App\Models\Permission;

Route::get('/', function (\Illuminate\Http\Request $request) {
	 
	$user = $request->user();
	$role = null;
	$role_permissions = null;
	$permissions = array();

	if($user){
		
		$user = User::where('id','=',$user->id)->first();
		$role = $user->role;				
		$role_permissions = $role->rolePermissions;

		foreach($role_permissions as $obj){
			array_push( $permissions, Permission::find($obj->permission_id) );
		}
	}
	
    return view('welcome', compact(['role','role_permissions', 'permissions']));
});

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
