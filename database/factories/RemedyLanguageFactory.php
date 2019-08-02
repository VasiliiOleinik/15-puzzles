<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Marker\Marker;
use App\Models\RemedyLanguage;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(RemedyLanguage::class, function (Faker $faker) {

    $tableShort = 'remedy';

    // Read medicine File
    $jsonString = file_get_contents(base_path('public/json/medicine.json'));
    $medicine = json_decode($jsonString, true);
    // Read russian text File
    $jsonString = file_get_contents(base_path('public/json/russian.json'));
    $russian = json_decode($jsonString, true);

    if( Config::get('app.faker_locale') == "en_US" ){
        $locale = "eng";
        $name = $medicine["drugs"][ rand( 0, 999) ];
        $content = $faker->realText(600);
        $tableId = remedyLanguage::count() + 1;
    }else{
        $locale = "ru";
        $name = $medicine["drugsRussian"][ rand( 0, 100) ];
        $content = $russian["text"][ rand( 0, 21) ];
        $tableId = 1;
    }

    return [
        'language' => $locale,
        $tableShort.'_id' => $tableId,
        'name' => $name,
        'content' => $content,        
    ];
});
