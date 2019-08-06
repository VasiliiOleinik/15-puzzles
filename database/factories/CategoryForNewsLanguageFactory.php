<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category\CategoryForNews;
use App\Models\Category\CategoryForNewsLanguage;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(CategoryForNewsLanguage::class, function (Faker $faker) {
    $tableShort = 'category_for_news';

    // Read russian text File
    $jsonString = file_get_contents(base_path('public/json/russian.json'));
    $russian = json_decode($jsonString, true);

    if( Config::get('app.faker_locale') == "en_US" ){
        $locale = "eng";                
        $name = $faker->word( 15 );//Protocol::find($protocol_id)->name;
        $tableId = CategoryForNewsLanguage::count() + 1;
    }else{
        $locale = "ru";        
        $name = $russian["categories"][ rand( 0, 21) ]; //$faker->realText(30);
        $tableId = CategoryForNewsLanguage::count() + 1 - CategoryForNews::count();
    }

    return [
        'language' => $locale,
        'name' => $name,
        $tableShort.'_id' => $tableId,
    ];
});
