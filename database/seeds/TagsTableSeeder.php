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


        $all_models = array();
        /*array_push($all_models, Factor::all());
        array_push($all_models, Disease::all());
        array_push($all_models, Protocol::all());
        array_push($all_models, Remedy::all());
        array_push($all_models, Marker::all());


        foreach($all_models as $models)
        {
            foreach($models as $model)
            {
                $name = $model->name;
                factory(Tag::class, 1)->create([
                    'name' => $name,
                ]);
            }
        }*/

        array_push($all_models, FactorLanguage::all());

        foreach($all_models as $models)
        {
            foreach($models as $model)
            {                
                factory(Tag::class, 1)->create([
                ]);
                factory(TagLanguage::class, 1)->create([
                    'language' => "eng",
                    'tag_id' => Tag::count(),
                    'name' => $model::withoutGlobalScopes()->where('language','=','eng')->get()[Tag::count()-1]->name,
                ]);
                factory(TagLanguage::class, 1)->create([                    
                    'language' => "ru",
                    'tag_id' => Tag::count(),
                    'name' =>  $model::withoutGlobalScopes()->where('language','=','ru')->get()[Tag::count()-1]->name,
                ]);
            }
        }

        //делаем одинаковыми имена
        foreach(Tag::all() as $tag){
            $tag->name = TagLanguage::where('tag_id','=',$tag->id)
                                          ->where('language','=','eng')->first()->name;
            $tag->save();
        }

    }
}

