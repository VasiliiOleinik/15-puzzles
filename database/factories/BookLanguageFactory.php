<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Book\Book;
use App\Models\Book\BookLanguage;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(BookLanguage::class, function (Faker $faker) {
    $tableShort = 'book';

    // Read russian text File
    $jsonString = file_get_contents(base_path('public/json/russian.json'));
    $russian = json_decode($jsonString, true);
    $gender = $faker->randomElement($array = array('male', 'female', 'mixed'));

    if (Config::get('app.faker_locale') == "en_US") {
        $locale = "eng";
        $title = $faker->realText(rand(15, 35));//Protocol::find($protocol_id)->name;
        $description = $faker->realText(90);
        $tableId = BookLanguage::withoutGlobalScopes()->count() + 1;
        $author = $faker->name($gender);
    } else {
        $locale = "ru";
        $title = $russian["title"][rand(0, 21)]; //$faker->realText(30);
        $author = $russian["authors"][rand(0, 21)]; //$faker->realText(30);
        $description = iconv_substr($russian["text"][rand(0, 21)], 0, 100, "UTF-8");
        $tableId = BookLanguage::withoutGlobalScopes()->count() + 1 - Book::count();
    }

    return [
        'language' => $locale,
        'title' => $title,
        'author' => $author,
        'description' => $description,
        $tableShort . '_id' => $tableId,
    ];
});
