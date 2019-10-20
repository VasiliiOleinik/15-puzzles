<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Laboratory\Laboratory;
use App\Models\Method;
use Faker\Generator as Faker;

$factory->define(Laboratory::class, function (Faker $faker) {
    return [
        'name' => $faker->country(),
        'phone' => $faker->phoneNumber(),
        'link'=>$faker->url(),
        'address'=>$faker->text(20),
        'lat' => $faker->latitude(-90, 90),
        'lng' => $faker->longitude(-90, 90),
    ];
});
