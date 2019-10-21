<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Marker\Marker;
use App\Models\Marker\MarkerLanguage;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(MarkerLanguage::class, function (Faker $faker) {

    $tableShort = 'marker';

    // Read russian text File
    $jsonString = file_get_contents(base_path('public/json/russian.json'));
    $russian = json_decode($jsonString, true);

    if( Config::get('app.faker_locale') == "en_US" ){
        $locale = "eng";
        $name = str_replace( ".", "", $faker->word )." test";
        $content = $faker->realText(600);
        $tableId = MarkerLanguage::withoutGlobalScopes()->count() + 1;
    }else{
        $locale = "ru";
        $name = str_replace( ".", "", $faker->word )." анализ";
        $content = $russian["text"][ rand( 0, 21) ];
        $tableId = MarkerLanguage::withoutGlobalScopes()->count() + 1 - Marker::count();
    }

    return [
        'language' => $locale,
        $tableShort.'_id' => $tableId,
        'name' => $name,
        'content' => $content,
    ];
});
