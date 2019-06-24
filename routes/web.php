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

Route::get('/', 'MainController@index')->name('main');
Route::resource('member_cases', 'MemberCaseController');
Route::get('/factor_diagram', 'FactorDiagramController@index')->name('factor_diagram');
Route::get('/about', 'AboutController@index')->name('about');


/* MAIN */

Route::post('/model_data_with_filters', 'MainController@model_data_with_filters')->name('model_data_with_filters');
Route::post('/evidences_content', 'MainController@evidences_content')->name('evidences_content');

Route::post('/details_content', 'MainController@details_content')->name('details_content');

Route::post('/protocol_pieces', 'MainController@protocol_pieces')->name('protocol_pieces');

/* ---- */



/* NEWS */
Route::resource('news', 'NewsController');
Route::get('/used_tags', 'NewsController@used_tags')->name('used_tags');
/* ---- */

/* PERSONAL CABINET */
Route::resource('user', 'UserController');
Route::resource('personal_cabinet', 'FileController', ['as' => 'file']); //file.personal_cabinet

/* ---- */

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

/*DB::listen(function($query) {
    var_dump($query->sql, $query->time);
});*/
