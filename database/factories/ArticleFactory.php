<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Article\Article;
use Faker\Generator as Faker;


$factory->define(Article::class, function (Faker $faker) {
   
    return [
        'title' => $faker->realText( rand(15,35)  ),
        'description' => implode( " ", $faker->words( rand(6,15) ) ),
        'content' => implode( " ", $faker->paragraphs( rand(4,9) ) ),
        'img' => "img/articles/".rand( 1,5 ).".png",
    ];
});
