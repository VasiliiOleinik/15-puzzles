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

Route::post('/pieces_content', 'MainController@pieces_content')->name('pieces_content');
Route::post('/protocols_content', 'MainController@protocols_content')->name('protocols_content');
Route::post('/remedies_content', 'MainController@remedies_content')->name('remedies_content');
Route::post('/markers_content', 'MainController@markers_content')->name('markers_content');

Route::post('/details_content', 'MainController@details_content')->name('details_content');

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');
