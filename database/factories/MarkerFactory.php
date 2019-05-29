<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Marker;
use Faker\Generator as Faker;

$factory->define(Marker::class, function (Faker $faker) {
    $marker_name = str_replace( ".", "", $faker->word )." test";

    return [
        'name' => $marker_name,
        'content' => $faker->realText(200),
    ];
});
