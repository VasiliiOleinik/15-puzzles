<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(FactorLanguage::class, function () {
    if( FactorLanguage::withoutGlobalScopes()->count() < Factor::count() ){
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
