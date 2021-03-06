<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Article\Article;
use App\Models\Article\ArticleLanguage;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(ArticleLanguage::class, function (Faker $faker) {
    $tableShort = 'article';

    // Read russian text File
    $jsonString = file_get_contents(base_path('public/json/russian.json'));
    $russian = json_decode($jsonString, true);

    if( Config::get('app.faker_locale') == "en_US" ){
        $locale = "eng";
        $content = $faker->realText(600);
        $tableId = ArticleLanguage::withoutGlobalScopes()->count() + 1;
        $title = $faker->realText( rand(15,35) );//Protocol::find($protocol_id)->name;
    }else{
        $locale = "ru";
        $title = $russian["title"][ rand( 0, 21) ]; //$faker->realText(30);
        $content = $russian["text"][ rand( 0, 21) ];
        $tableId = ArticleLanguage::withoutGlobalScopes()->count() + 1 - Article::count();
    }

    return [
        'language' => $locale,
        'title' => $title,
        'content' => $content,
        'description' => iconv_substr($content,0,100 , "UTF-8"),
        $tableShort.'_id' => $tableId,
    ];
});
