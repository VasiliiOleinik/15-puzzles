<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MemberCase;
use App\Models\User\User;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(MemberCase::class, function (Faker $faker) {
    $content = $faker->realText(3200);
    $status = ['moderating', 'show', 'hide'];

    $lang = rand(0, 1) == 0 ? 'en_EN' : 'ru_RU';
    $faker2 = Factory::create($lang);
    $content = $faker2->realText(600);

    return [
        'user_id' => User::all()->random()->id,
        'img' => "/img/post_".rand( 1,4 ).".png",
        'status' => $status[rand( 0,count($status)-1 )],
        'anonym' => rand( 0, 1 ),

        'is_active' => rand(0, 1),
        'title' => $faker2->realText(rand(15, 35)),
        'description' => iconv_substr($content, 0, 100, "UTF-8"),
        'content' => $content,
    ];
});
