<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Protocol\Protocol;
use App\Models\Evidence;
use Faker\Generator as Faker;

$factory->define(Protocol::class, function (Faker $faker) {

    $protocol_name = $faker->name."'s "." protocol";

    return [
         'name' => $protocol_name,
         'content' => $faker->realText(600),
         'evidence_id' =>  Evidence::all()->random()->id,
         'subtitle' => $faker->realText(100),
         'url' => "http://www.drrathresearch.org/drrath-discoveries/cancer",
    ];
});
