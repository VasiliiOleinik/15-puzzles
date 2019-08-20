<?php

// PackageManager::load('admin-default')
//    ->css('extend', public_path('packages/sleepingowl/default/css/extend.css'));

/* FACTORS */
Route::post('/admin/factors/create', 'App\Http\Controllers\FactorsController@create');
Route::delete('/admin/factors/{id}/delete', 'App\Http\Controllers\FactorsController@destroy');
Route::post('/admin/factors/{id}/edit', 'App\Http\Controllers\FactorsController@edit');
/* ---- */

/* DISEASES */
Route::post('/admin/diseases/create', 'App\Http\Controllers\DiseasesController@create');
Route::delete('/admin/diseases/{id}/delete', 'App\Http\Controllers\DiseasesController@destroy');
Route::post('/admin/diseases/{id}/edit', 'App\Http\Controllers\DiseasesController@edit');
/* ---- */

/* PROTOCOLS */
Route::post('/admin/protocols/create', 'App\Http\Controllers\ProtocolsController@create');
Route::delete('/admin/protocols/{id}/delete', 'App\Http\Controllers\ProtocolsController@destroy');
Route::post('/admin/protocols/{id}/edit', 'App\Http\Controllers\ProtocolsController@edit');
/* ---- */

/* REMEDIES */
Route::post('/admin/remedies/create', 'App\Http\Controllers\RemediesController@create');
Route::delete('/admin/remedies/{id}/delete', 'App\Http\Controllers\RemediesController@destroy');
Route::post('/admin/remedies/{id}/edit', 'App\Http\Controllers\RemediesController@edit');
/* ---- */

/* MARKERS */
Route::post('/admin/markers/create', 'App\Http\Controllers\MarkersController@create');
Route::delete('/admin/markers/{id}/delete', 'App\Http\Controllers\MarkersController@destroy');
Route::post('/admin/markers/{id}/edit', 'App\Http\Controllers\MarkersController@edit');
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

/* METHODS */
Route::post('/admin/methods/create', 'App\Http\Controllers\MethodsController@create');
Route::delete('/admin/methods/{id}/delete', 'App\Http\Controllers\MethodsController@destroy');
Route::post('/admin/methods/{id}/edit', 'App\Http\Controllers\MethodsController@edit');
/* ---- */

/* TAGS */
Route::post('/admin/tags/create', 'App\Http\Controllers\TagsController@create');
Route::delete('/admin/tags/{id}/delete', 'App\Http\Controllers\TagsController@destroy');
Route::post('/admin/tags/{id}/edit', 'App\Http\Controllers\TagsController@edit');
/* ---- */


