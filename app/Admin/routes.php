<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::post('/users', ['as' => 'admin.users', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('/config','App\Http\Controllers\ConfigController@index')->name('admin.config');
Route::post('/config/link', 'App\Http\Controllers\ConfigController@link')->name('admin.config.link');

Route::group([ 'middleware' => 'debugbarDisable' ], function() {
    Route::get('/pages/main','App\Http\Controllers\PagesController@main')->name('admin.pages.main');
    Route::get('/pages/member-cases','App\Http\Controllers\PagesController@memberCases')->name('admin.pages.member-cases');
    Route::get('/pages/factor-diagram','App\Http\Controllers\PagesController@factorDiagram')->name('admin.pages.factor-diagram');
    Route::get('/pages/about','App\Http\Controllers\PagesController@about')->name('admin.pages.about');
    Route::get('/pages/news','App\Http\Controllers\PagesController@news')->name('admin.pages.news');
    Route::get('/pages/literature','App\Http\Controllers\PagesController@literature')->name('admin.pages.literature');
    Route::get('/pages/faq','App\Http\Controllers\PagesController@faq')->name('admin.pages.faq');

    Route::post('/pages/post', 'App\Http\Controllers\PagesController@post')->name('admin.pages.post');
}); 

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);
