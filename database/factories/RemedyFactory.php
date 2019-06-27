<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Remedy;
use Faker\Generator as Faker;

$factory->define(Remedy::class, function (Faker $faker) {

    // Read medicine File
    $jsonString = file_get_contents(base_path('public/json/medicine.json'));
    $medicine = json_decode($jsonString, true);
    
    //$remedy_name = $faker->word." ".$faker->word." ".$faker->word." method.";

    return [
         'name' => $medicine["drugs"][ rand( 0, 999) ], //$remedy_name,
         'content' => $faker->realText(200),         
         'url' => "http://www.drrathresearch.org/drrath-discoveries/cancer",
    ];
});
