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

        for($i = 0; $i < Disease::count()+1; $i++){
            factory(DiseaseLanguage::class, 1 )->create();
        }

        $data = [
            ['name' => 'disease_1', 'disease_id' => 1],
            ['name' => 'disease_2', 'disease_id' => 2],
        ];

        for($i = 0; $i < count($data); $i++){

            DB::table($table)
                ->where('id', $i + 1)
                ->update($data[$i]);
        }
    }
}
