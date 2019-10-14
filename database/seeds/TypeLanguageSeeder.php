<?php

use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\TypesLanguage;

class TypeLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = Type::all();
        $faker = Faker\Factory::create();
        $jsonString = file_get_contents(base_path('public/json/russian.json'));
        $russian = json_decode($jsonString, true);
        foreach ($types as $type) {
            \App\Models\TypesLanguage::create([
                'language'=>'eng',
                'type_id' => $type->id,
                'name' => $faker->name,
                'abnormal_condition' => $faker->realText(10),
                'normal_condition' => $faker->realText(10),
            ]);

            \App\Models\TypesLanguage::create([
                'language'=>'ru',
                'type_id' => $type->id,
                'name' => $russian['title'][rand(0, 8)],
                'abnormal_condition' => $russian['text'][rand(0, 21)],
                'normal_condition' =>$russian['text'][rand(0, 21)],
            ]);
        }
    }
}
