<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Marker\Marker;
use App\Models\Marker\MarkerLanguage;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(MarkerLanguage::class, function (Faker $faker) {
    if( MarkerLanguage::count() < Marker::count() ){
        $locale = "eng";
        $faker = Factory::create('en_EN');
    }else{       
        $locale = "ru";
        $faker = Factory::create('ru_RU');
    }

    return [
        'language' => $locale,
        'content' => $faker->realText(800),
    ];
});
