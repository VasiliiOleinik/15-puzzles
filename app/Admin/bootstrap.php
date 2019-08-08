<?php

// PackageManager::load('admin-default')
//    ->css('extend', public_path('packages/sleepingowl/default/css/extend.css'));

Route::post('/admin/factorLanguages/create', 'App\Http\Controllers\FactorsController@create');
Route::delete('/admin/factorLanguages/{id}/delete', 'App\Http\Controllers\FactorsController@destroy');
Route::post('/admin/factorLanguages/{id}/edit', 'App\Http\Controllers\FactorsController@edit');
//Route::delete('/admin/factorLanguages/{id}/edi', 'App\Http\Controllers\FactorsController@destroy');
//Route::delete('/admin/factorLanguages/{id}/destroy', 'App\Http\Controllers\FactorsController@destroy');

//Route::get('/admin/factorLanguages/create');
