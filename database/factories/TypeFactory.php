<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        'name' => $faker->word(15),
        'abnormal_condition' => $faker->realText(50),
        'normal_condition' => $faker->realText(50),  
    ];
});
