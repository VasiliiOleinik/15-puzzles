<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Protocol\Protocol;
use App\Models\Protocol\ProtocolLanguage;
use Faker\Generator as Faker;
use Faker\Factory as Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

$factory->define(ProtocolLanguage::class, function (Faker $faker){

    // Read russian text File
    $jsonString = file_get_contents(base_path('public/json/russian.json'));
    $russian = json_decode($jsonString, true);

    if( Config::get('app.faker_locale') == "en_US" ){
        $locale = "eng";        
        $content = $faker->realText(600);
        $protocolId = ProtocolLanguage::count() + 1;
        $name = $faker->name."'s "." protocol";//Protocol::find($protocol_id)->name;
    }else{
        $locale = "ru";
        $name = "Протокол ".$faker->name;
        $content = $russian["text"][ rand( 0, 21) ];        
        $protocolId = ProtocolLanguage::count() + 1 - Protocol::count();
    }
    $evidenceId = Protocol::find($protocolId)->evidence_id;

    return [
        'language' => $locale,
        'name' => $name,
        'content' => $content, 
        'subtitle' => iconv_substr($content,0,100 , "UTF-8"),
        'protocol_id' => $protocolId,
        'evidence_id' => $evidenceId,
    ];
});
