<?php

use App\Models\Tag;
use App\Models\Factor\Factor;
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


        $all_models = array();
        array_push($all_models, Factor::all());
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
        }

    }
}

