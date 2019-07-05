<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category\CategoryForBooks;
use Faker\Generator as Faker;

$factory->define(CategoryForBooks::class, function (Faker $faker) {
    return [
        'name' => $faker->word(15),
    ];
});
