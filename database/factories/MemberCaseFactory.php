<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MemberCase;
use App\Models\User\User;
use Faker\Generator as Faker;

$factory->define(MemberCase::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'content' => $faker->realText(400),        
    ];
});
