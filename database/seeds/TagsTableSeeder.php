<?php

use App\Models\Tag;
use App\Models\TagLanguage;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;
use App\Models\Disease\Disease;
use App\Models\Protocol\Protocol;
use App\Models\Remedy;
use App\Models\Marker\Marker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        DB::update("ALTER TABLE tags AUTO_INCREMENT = 0;");
        DB::table('tag_languages')->delete();
        DB::update("ALTER TABLE tag_languages AUTO_INCREMENT = 0;");

        $models_eng = FactorLanguage::withoutGlobalScopes()->where('language', 'eng')->get();
        $models_rus = FactorLanguage::withoutGlobalScopes()->where('language', 'ru')->get();

        foreach($models_eng as $model)
        {
            $tag = Tag::create();
            TagLanguage::create([
                'language' => "eng",
                'tag_id' => $tag->id,
                'name' => str_random(5), //$model::withoutGlobalScopes()->where('language','=','eng')->get()[$tag->id-1]->name,
            ]);
            TagLanguage::create([
                'language' => "ru",
                'tag_id' => $tag->id,
                'name' => str_random(5), //$model::withoutGlobalScopes()->where('language','=','ru')->get()[$tag->id-1]->name,
            ]);
        }

    }
}

