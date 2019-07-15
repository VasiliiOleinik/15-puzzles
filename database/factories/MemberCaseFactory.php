<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MemberCase;
use App\Models\User\User;
use Faker\Generator as Faker;

$factory->define(MemberCase::class, function (Faker $faker) {
    $content = $faker->realText(3200);
    $status = ['moderating', 'show', 'hide'];
    return [
        'user_id' => User::all()->random()->id,
        'title' => $faker->realText( rand(15,35)  ),
        'description' => substr($content,0,186),
        'content' => $content,
        'img' => "img/post_".rand( 1,4 ).".png",
        'status' => $status[rand( 0,count($status)-1 )],
    ];
});
