<?php

use Illuminate\Database\Seeder;
use App\Models\Disease\Disease;
use App\Models\Disease\DiseaseLanguage;

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

        for($i = 0; $i < Disease::count()*2; $i++){
            factory(DiseaseLanguage::class, 1 )->create();
        }

        $data = [
            //eng
            ['name' => 'disease_1', 'disease_id' => 1],
            ['name' => 'disease_2', 'disease_id' => 2],
            ['name' => 'disease_3', 'disease_id' => 3],
            ['name' => 'disease_4', 'disease_id' => 4],
            ['name' => 'disease_5', 'disease_id' => 5],
            ['name' => 'disease_6', 'disease_id' => 6],
            ['name' => 'disease_7', 'disease_id' => 7],
            //ru
            ['name' => 'болезнь 1', 'disease_id' => 1],
            ['name' => 'болезнь 2', 'disease_id' => 2],
            ['name' => 'болезнь 3', 'disease_id' => 3],
            ['name' => 'болезнь 4', 'disease_id' => 4],
            ['name' => 'болезнь 5', 'disease_id' => 5],
            ['name' => 'болезнь 6', 'disease_id' => 6],
            ['name' => 'болезнь 7', 'disease_id' => 7],
        ];

        for($i = 0; $i < count($data); $i++){

            DB::table($table)
                ->where('id', $i + 1)
                ->update($data[$i]);
        }
        //делаем одинаковыми имена
        foreach(Disease::all() as $disease){
            $disease->name = DiseaseLanguage::where('disease_id','=',$disease->id)
                                          ->where('language','=','eng')->first()->name;
            $disease->save();
        }
    }
}
