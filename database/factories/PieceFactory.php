<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Piece\Piece;
use Faker\Generator as Faker;


$factory->define(Piece::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(400),    
    ];
});
