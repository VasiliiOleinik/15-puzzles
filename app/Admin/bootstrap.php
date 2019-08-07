<?php

// PackageManager::load('admin-default')
//    ->css('extend', public_path('packages/sleepingowl/default/css/extend.css'));

Route::post('/admin/factorLanguages/create', 'App\Http\Controllers\FactorsController@create');
//Route::get('/admin/factorLanguages/create');
