<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Article\Article;
use Faker\Generator as Faker;


$factory->define(Article::class, function (Faker $faker) {
    return [
        'img' => "/img/post_".rand( 1,4 ).".png",
    ];
});
