<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MedicalHistory;
use App\Models\User\User;
use Faker\Generator as Faker;

$factory->define(MedicalHistory::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(400),
        'user_id' => User::all()->random()->id,
    ];
});
