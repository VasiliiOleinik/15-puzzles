<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\CategoryForNews;
use Faker\Generator as Faker;

$factory->define(CategoryForNews::class, function (Faker $faker) {
    return [
        'name' => $faker->word(15),
    ];
});
