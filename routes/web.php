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

Route::get('/', function () {
    return redirect(app()->getLocale());
});

/* LOCALIZATION */
Route::group([ 'prefix' => '{locale}', 'where' => ['locale' => '(eng|ru)'], 'middleware' => 'setlocale' ], function() {

    Route::get('/', 'MainController@index')->name('main');
    Route::resource('member_cases', 'MemberCaseController');
    Route::get('factor_diagram', 'FactorDiagramController@index')->name('factor_diagram');
    Route::get('about', 'AboutController@index')->name('about');
    Route::resource('news', 'NewsController');        
    Route::get('literature', 'LiteratureController@index')->name('literature');
    Route::get('faq', 'FaqController@index')->name('faq');
    Route::resource('personal_cabinet', 'FileController', ['as' => 'file']); //file.personal_cabinet    

    Route::get('literature-modal', 'LiteratureController@literatureModal')->name('literature-modal');

    Auth::routes(['verify' => true]);
});

/* MAIN */
    Route::post('filter', 'MainController@filter')->name('filter');
    Route::post('model_partial', 'MainController@modelPartial')->name('model_partial');
/* ---- */

Route::resource('user', 'UserController');
Route::get('used_tags', 'NewsController@usedTags')->name('used_tags');

/* FILE */
Route::get('download/{id}', 'FileController@download');
/* ---- */
