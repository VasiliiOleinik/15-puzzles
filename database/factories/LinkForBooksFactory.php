<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Book\LinkForBooks;
use Faker\Generator as Faker;

$factory->define(LinkForBooks::class, function (Faker $faker) {      
    return [        
        'url' => "http://www.drrathresearch.org/drrath-discoveries/cancer",        
    ];
});
