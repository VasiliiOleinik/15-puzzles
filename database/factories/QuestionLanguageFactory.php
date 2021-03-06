<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Question;
use App\Models\QuestionLanguage;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(QuestionLanguage::class, function (Faker $faker) {
    $tableShort = 'question';

    // Read russian text File
    $jsonString = file_get_contents(base_path('public/json/russian.json'));
    $russian = json_decode($jsonString, true);

    if( Config::get('app.faker_locale') == "en_US" ){
        $locale = "eng";
        $name = $faker->realText( rand(80,110) );//Protocol::find($protocol_id)->name;
        $content = $faker->realText(600);
        $tableId = QuestionLanguage::withoutGlobalScopes()->count() + 1;
        $title = $faker->realText( rand(10,20) );
    }else{
        $locale = "ru";
        $name = iconv_substr($russian["questions"][ rand( 0, 21) ],0,191 , "UTF-8");
        $content = iconv_substr($russian["text"][ rand( 0, 21) ],0,191 , "UTF-8");
        $tableId = QuestionLanguage::withoutGlobalScopes()->count() + 1 - Question::count();
        $title = iconv_substr($russian["text"][ rand( 0, 21) ],0,191 , "UTF-8");
    }

    return [
        'language' => $locale,
        'name' => $name,
        'content' => $content,
        'title'=>$title,
        $tableShort.'_id' => $tableId,
    ];
});
