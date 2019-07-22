<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Article\Article;
use Faker\Generator as Faker;


$factory->define(Article::class, function (Faker $faker) {
   
    return [
        'title' => $faker->realText( rand(15,35)  ),
        'description' => $faker->realText( rand(160,190) ),
        'content' => implode( " ", $faker->paragraphs( rand(4,9) ) ),        
        'img' => "/img/post_".rand( 1,4 ).".png",
    ];
});
