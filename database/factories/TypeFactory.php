<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {

    return [
        'img' => '/img/svg/oxygen_metabolism.svg'
    ];
});
