<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(FactorLanguage::class, function () {
    //$factorId = 1 ;
    if( FactorLanguage::count() < Factor::count() ){
        $locale = "eng";
        $faker = Factory::create('en_EN');
        $factorId = FactorLanguage::count() + 1;
    }else{       
        $locale = "ru";
        $faker = Factory::create('ru_RU');
        $factorId = FactorLanguage::count() + 1 - Factor::count();
    }

    return [
        'language' => $locale,
        'factor_id' => $factorId,
        'content' => $faker->realText(800),
        'type_id' =>  Factor::find($factorId)->type_id,
    ];
});
