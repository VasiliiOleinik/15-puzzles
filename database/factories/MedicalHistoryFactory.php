<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MedicalHistory;
use App\Models\User\User;
use Faker\Generator as Faker;

$factory->define(MedicalHistory::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(50),
        'content' => $faker->realText(400),
        'img' => "/img/post_".rand( 1,4 ).".png",
        'user_id' => User::all()->random()->id,
    ];
});
