<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Book\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->realText( rand(15,25)  ),
        'description' => $faker->realText( rand(160,190) ),     
        'img' => "img/books/book".rand( 1,4 ).".jpg",
    ];
});
