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
Route::get('/literature', 'LiteratureController@index')->name('literature');

/* MAIN */
Route::post('/filter', 'MainController@filter')->name('filter');
Route::post('/evidences', 'MainController@evidences')->name('evidences');
Route::post('/markers_partial', 'MainController@markersPartial')->name('markers_partial');
Route::post('/model_partial', 'MainController@modelPartial')->name('model_partial');
/* ---- */

/* NEWS */
Route::resource('news', 'NewsController');
Route::get('/used_tags', 'NewsController@usedTags')->name('used_tags');
/* ---- */

/* LITERATURE */
Route::get('/literature-modal', 'LiteratureController@literatureModal')->name('literature-modal');
/* ---- */

/* PERSONAL CABINET */
Route::resource('user', 'UserController');
Route::resource('personal_cabinet', 'FileController', ['as' => 'file']); //file.personal_cabinet
/* ---- */

Auth::routes(['verify' => true]);
