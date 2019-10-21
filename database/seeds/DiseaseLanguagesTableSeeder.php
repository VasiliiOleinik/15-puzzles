<?php

use Illuminate\Database\Seeder;
use App\Models\Disease\Disease;
use App\Models\Disease\DiseaseLanguage;
use Faker\Factory as Factory;

class DiseaseLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'disease_languages';
        DB::table($table)->delete();
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        // for($i = 0; $i < Disease::count()+2; $i++){
        //     factory(DiseaseLanguage::class, 1 )->create();
        // }

        $data = [
            ['name' => 'disease_1', 'disease_id' => 1, 'language' => 'eng', 'content' => Factory::create('en_EN')->realText(800)],
            ['name' => 'disease_2', 'disease_id' => 2, 'language' => 'eng', 'content' => Factory::create('en_EN')->realText(800)],
            ['name' => 'болезнь_1', 'disease_id' => 1, 'language' => 'ru', 'content' => Factory::create('ru_RU')->realText(800)],
            ['name' => 'болезнь_2', 'disease_id' => 2, 'language' => 'ru', 'content' => Factory::create('ru_RU')->realText(800)],
        ];

        DB::table($table)->insert($data);

        // for($i = 0; $i < count($data); $i++){

        //     DB::table($table)
        //         ->where('id', $i + 1)
        //         ->update($data[$i]);
        // }
    }
}
