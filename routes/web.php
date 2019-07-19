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

Auth::routes();

/* LOCALIZATION */
Route::group([ 'prefix' => '{locale}', 'where' => ['locale' => '(eng|ru)'], 'middleware' => 'setlocale' ], function() {

    Route::get('/', 'MainController@index')->name('main');
    Route::resource('member_cases', 'MemberCaseController');
    Route::post('member_cases/create_post', 'MemberCaseController@createPost')->name('create_post');//без этого не работает сохранение нового кейса с картинкой
    Route::get('factor_diagram', 'FactorDiagramController@index')->name('factor_diagram');
    Route::get('about', 'AboutController@index')->name('about');
    Route::resource('news', 'NewsController');        
    Route::get('literature', 'LiteratureController@index')->name('literature');
    Route::get('faq', 'FaqController@index')->name('faq');
    Route::resource('personal_cabinet', 'FileController', ['as' => 'file']); //file.personal_cabinet    

    Route::get('literature-modal', 'LiteratureController@literatureModal')->name('literature-modal');

    Route::get('search', 'SearchController@index')->name('search');

    //Auth::routes(['verify' => true]);
    
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Email Verification Routes...
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');    

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
   Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
}); 


    


/* MAIN */
    Route::post('filter', 'MainController@filter')->name('filter');    
    Route::post('model_partial', 'MainController@modelPartial')->name('model_partial');
/* ---- */

Route::resource('user', 'UserController');
Route::get('used_tags', 'NewsController@usedTags')->name('used_tags');
Route::get('tags_cloud', 'NewsController@tagsCloud')->name('tags_cloud');

/* FILE */
Route::get('download/{id}', 'FileController@download');
/* ---- */
