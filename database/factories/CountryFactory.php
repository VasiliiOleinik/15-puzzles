<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'name' => $faker->country(),
        'lat' => $faker->latitude(-90, 90),
        'lng' => $faker->longitude(-90, 90),
    ];
});
