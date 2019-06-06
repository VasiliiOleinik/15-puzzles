<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word(15),
        'abnormal_condition' => $faker->realText(50),
        'normal_condition' => $faker->realText(50),  
    ];
});
