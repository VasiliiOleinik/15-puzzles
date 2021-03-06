<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Book\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    // Returns always random genders according to the name, inclusive mixed !!
    $gender = $faker->randomElement($array = array('male','female','mixed'));
    return [
        'img' => "/img/books/book".rand( 1,4 ).".jpg",
    ];
});
