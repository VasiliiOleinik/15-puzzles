<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Marker\Marker;
use App\Models\RemedyLanguage;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(RemedyLanguage::class, function (Faker $faker) {

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
        $remedyId = remedyLanguage::count() + 1;
    }else{
        $locale = "ru";
        $name = $medicine["drugsRussian"][ rand( 0, 100) ];
        $content = $faker->realText(600);//$russian["text"][ rand( 0, 21) ];
        $remedyId = 1;
    }

    return [
        'language' => $locale,
        'remedy_id' => $remedyId,
        'name' => $name,
        'content' => $content,        
    ];
});
