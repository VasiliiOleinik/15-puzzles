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
    Route::post('member_cases/update_post', 'MemberCaseController@updatePost')->name('update_post');//без этого не работает сохранение кейса с картинкой
    Route::get('factor_diagram', 'FactorDiagramController@index')->name('factor_diagram');
    Route::get('about', 'AboutController@index')->name('about');
    Route::get('news/category/{name}', 'NewsController@index')->name('news_category');
    Route::resource('news', 'NewsController');
    Route::get('news/{alias}', 'NewsController@show')->name('news_show');
    Route::get('literature', 'LiteratureController@index')->name('literature');
    Route::get('literature/category/{name}', 'LiteratureController@index')->name('literature_category');
    Route::get('faq', 'FaqController@index')->name('faq');
    Route::post('faq', 'FaqController@letter')->name('letter');
    Route::resource('personal_cabinet', 'FileController', ['as' => 'file']); //file.personal_cabinet


    Route::post('literature-modal', 'LiteratureController@literatureModal')->name('literature-modal');
    Route::get('search', 'SearchController@index')->name('search');

    Route::get('used_tags', 'NewsController@usedTags')->name('used_tags');
    Route::get('tags_cloud', 'NewsController@tagsCloud')->name('tags_cloud');

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Email Verification Routes...
    Route::get('email/verify', 'Auth\VerificationController@showLocale')->name('verification.notice.locale');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    Route::resource('subscriber', 'SubscriberController');

    Route::post('print_row/', 'FactorDiagramController@printRowAboutFactor');
});

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

/* MAIN */
Route::post('filter', 'MainController@filter')->name('filter');
Route::post('model_partial', 'MainController@modelPartial')->name('model_partial');
Route::post('map_refresh', 'MainController@mapRefresh')->name('map_refresh');
/* ---- */

Route::resource('comment', 'CommentController');

Route::resource('user', 'UserController');

/* FILE */
Route::get('download/{id}', 'FileController@download');
/* ---- */

/* MEDICAL HISTORY */
Route::delete('medical_history/{id}', 'MedicalHistoryController@destroy');
Route::post('medical_history/create_post', 'MedicalHistoryController@createPost')->name('medical_history_create_post');//без этого не работает сохранение новой мед истории с картинкой
Route::post('medical_history/update_post/{id}', 'MedicalHistoryController@updatePost')->name('medical_history_update_post');//без этого не работает сохранение мед истории с картинкой
/* ---- */

/*FACTOR DIAGRAM*/

/*FACTOR DIAGRAM END*/
