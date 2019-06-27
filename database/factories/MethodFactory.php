<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Method;
use Faker\Generator as Faker;

$factory->define(Method::class, function (Faker $faker) {
    //$name = "Method ".str_replace( ".", "", $faker->word );

    return [
        //'name' => $name,
        'content' => $faker->realText(200),
    ];
});
