<?php

// PackageManager::load('admin-default')
//    ->css('extend', public_path('packages/sleepingowl/default/css/extend.css'));

/* FACTORS */
Route::post('/admin/factorLanguages/create', 'App\Http\Controllers\FactorsController@create');
Route::delete('/admin/factorLanguages/{id}/delete', 'App\Http\Controllers\FactorsController@destroy');
Route::post('/admin/factorLanguages/{id}/edit', 'App\Http\Controllers\FactorsController@edit');
/* ---- */

/* DISEASES */
Route::post('/admin/diseaseLanguages/create', 'App\Http\Controllers\DiseasesController@create');
Route::delete('/admin/diseaseLanguages/{id}/delete', 'App\Http\Controllers\DiseasesController@destroy');
Route::post('/admin/diseaseLanguages/{id}/edit', 'App\Http\Controllers\DiseasesController@edit');
/* ---- */

/* PROTOCOLS */
Route::post('/admin/protocolLanguages/create', 'App\Http\Controllers\ProtocolsController@create');
Route::delete('/admin/protocolLanguages/{id}/delete', 'App\Http\Controllers\ProtocolsController@destroy');
Route::post('/admin/protocolLanguages/{id}/edit', 'App\Http\Controllers\ProtocolsController@edit');
/* ---- */

/* REMEDIES */
Route::post('/admin/remedyLanguages/create', 'App\Http\Controllers\RemediesController@create');
Route::delete('/admin/remedyLanguages/{id}/delete', 'App\Http\Controllers\RemediesController@destroy');
Route::post('/admin/remedyLanguages/{id}/edit', 'App\Http\Controllers\RemediesController@edit');
/* ---- */

/* MARKERS */
Route::post('/admin/markerLanguages/create', 'App\Http\Controllers\MarkersController@create');
Route::delete('/admin/markerLanguages/{id}/delete', 'App\Http\Controllers\MarkersController@destroy');
Route::post('/admin/markerLanguages/{id}/edit', 'App\Http\Controllers\MarkersController@edit');
/* ---- */

/* NEWS */
Route::post('/admin/news/create', 'App\Http\Controllers\NewsController@create');
Route::delete('/admin/news/{id}/delete', 'App\Http\Controllers\NewsController@destroy');
Route::post('/admin/news/{id}/edit', 'App\Http\Controllers\NewsController@edit');
/* ---- */

/* LITERATURE */
Route::post('/admin/literature/create', 'App\Http\Controllers\LiteratureController@create');
Route::delete('/admin/literature/{id}/delete', 'App\Http\Controllers\LiteratureController@destroy');
Route::post('/admin/literature/{id}/edit', 'App\Http\Controllers\LiteratureController@edit');
/* ---- */

/* FAQ */
Route::post('/admin/faq/create', 'App\Http\Controllers\FaqController@create');
Route::delete('/admin/faq/{id}/delete', 'App\Http\Controllers\FaqController@destroy');
Route::post('/admin/faq/{id}/edit', 'App\Http\Controllers\FaqController@edit');
/* ---- */

/* CONFIG.APP */
//Route::get('/admin/config', 'App\Http\Controllers\ConfigController@index')->name('admin.config');;
/* ---- */

//Route::post('/admin/factorLanguages/{locale}/setFactorsLanguage', 'App\Http\Controllers\FactorsController@setFactorsLanguage');
//Route::delete('/admin/factorLanguages/{id}/edi', 'App\Http\Controllers\FactorsController@destroy');
//Route::delete('/admin/factorLanguages/{id}/destroy', 'App\Http\Controllers\FactorsController@destroy');

//Route::get('/admin/factorLanguages/create');
