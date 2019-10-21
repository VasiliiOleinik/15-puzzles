<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Method;
use App\Models\MethodLanguage;
use Faker\Generator as Faker;

$factory->define(MethodLanguage::class, function (Faker $faker) {
    $tableShort = 'method';

    // Read russian text File
    $jsonString = file_get_contents(base_path('public/json/russian.json'));
    $russian = json_decode($jsonString, true);

    if (Config::get('app.faker_locale') == "en_US") {
        $locale = "eng";
        $name = str_replace(".", "", $faker->word) . " method";
        $content = $faker->realText(600);
        $tableId = MethodLanguage::withoutGlobalScopes()->count() + 1;
    } else {
        $locale = "ru";
        $name = str_replace(".", "", $faker->word) . " метод";
        $content = $russian["text"][rand(0, 21)];
        $tableId = MethodLanguage::withoutGlobalScopes()->count() + 1 - Method::count();
    }

    return [
        'language' => $locale,
        $tableShort . '_id' => $tableId,
        'name' => $name,
        'content' => $content,
    ];
});
