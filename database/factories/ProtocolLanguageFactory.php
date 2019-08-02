<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Protocol\Protocol;
use App\Models\Protocol\ProtocolLanguage;
use Faker\Generator as Faker;
use Faker\Factory as Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

$factory->define(ProtocolLanguage::class, function (Faker $faker){

    // Read medicine File
    $jsonString = file_get_contents(base_path('public/json/russian.json'));
    $russian = json_decode($jsonString, true);
    if( Config::get('app.faker_locale') == "en_US" ){
        $locale = "eng";        
        $content = $faker->realText(600);
        $protocol_id = ProtocolLanguage::count() + 1;
        $protocol_name = $faker->name."'s "." protocol";//Protocol::find($protocol_id)->name;
    }else{
        $locale = "ru";
        $protocol_name = "Протокол ".$faker->name;
        $content = $russian["text"][ rand( 0, 21) ];        
        $protocol_id = ProtocolLanguage::count() + 1 - Protocol::count();
    }
    $evidence_id = Protocol::find($protocol_id)->evidence_id;

    return [
        'language' => $locale,
        'name' => $protocol_name,
        'content' => $content, 
        'subtitle' => iconv_substr($content,0,100 , "UTF-8"),
        'protocol_id' => $protocol_id,
        'evidence_id' => $evidence_id,
    ];
});
