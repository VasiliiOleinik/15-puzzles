<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Disease\Disease;
use Faker\Generator as Faker;

$factory->define(Disease::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(400),  
    ];
});
