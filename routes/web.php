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

	if($user){
		$user = App\Models\User\User::where('id','=',$user->id)->first();
		$role = $user->role;
	}
	
    return view('welcome', compact('role'));
});

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
