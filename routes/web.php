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

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');
