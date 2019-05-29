<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Remedy;
use Faker\Generator as Faker;

$factory->define(Remedy::class, function (Faker $faker) {

    $remedy_name = str_replace( ".", "", $faker->word )." test";

    return [
         'name' => $remedy_name,
         'content' => $faker->realText(200),
    ];
});
