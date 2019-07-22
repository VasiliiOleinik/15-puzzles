<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Comment;
use App\Models\MemberCase;
use App\Models\User\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(400),
        'member_case_id' => MemberCase::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});
