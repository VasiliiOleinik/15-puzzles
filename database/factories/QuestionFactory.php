<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => $faker->realText( rand(15,35)  ),
        'content' => implode( " ", $faker->paragraphs( rand(2,6) ) ),
    ];
});
