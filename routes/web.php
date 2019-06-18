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
Route::get('/members_cases', 'MemberCaseController@index')->name('member_case');
Route::get('/factor_diagram', 'FactorDiagramController@index')->name('factor_diagram');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/news', 'NewsController@index')->name('news');

/* MAIN */

Route::post('/model_data_with_filters', 'MainController@model_data_with_filters')->name('model_data_with_filters');
Route::post('/evidences_content', 'MainController@evidences_content')->name('evidences_content');

Route::post('/details_content', 'MainController@details_content')->name('details_content');

Route::post('/protocol_pieces', 'MainController@protocol_pieces')->name('protocol_pieces');

/* ---- */



/* NEWS */
Route::get('/tag_names', 'NewsController@tag_names')->name('tag_names');
Route::post('/news_content', 'NewsController@news_content')->name('news_content');
/* ---- */

/* PERSONAL CABINET */
Route::get('/personal_cabinet', 'PersonalCabinetController@personal_cabinet')->name('personal_cabinet');
Route::post('/user_edit', 'UserController@user_edit')->name('user_edit');
Route::post('/upload', 'PersonalCabinetController@upload')->name('upload');
Route::post('/delete', 'PersonalCabinetController@delete')->name('delete');
/* ---- */

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

/*DB::listen(function($query) {
    var_dump($query->sql, $query->time);
});*/
