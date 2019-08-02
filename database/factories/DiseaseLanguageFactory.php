<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Disease\Disease;
use App\Models\Disease\DiseaseLanguage;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(DiseaseLanguage::class, function (Faker $faker) {

    if( DiseaseLanguage::count() < Disease::count() ){
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
