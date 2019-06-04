<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Protocol\Protocol;
use Faker\Generator as Faker;

$factory->define(Protocol::class, function (Faker $faker) {

    $protocol_name = $faker->name."'s "." protocol";

    return [
         'name' => $protocol_name,
         'content' => $faker->realText(200),
    ];
});
