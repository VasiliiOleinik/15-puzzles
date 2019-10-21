<?php

use Illuminate\Database\Seeder;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;

class FactorLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'factor_languages';
        DB::table($table)->delete();
        DB::update("ALTER TABLE " . $table . " AUTO_INCREMENT = 0;");

        // for ($i = 0; $i < Factor::count() + 1; $i++) {
        //     factory(FactorLanguage::class, 1)->create();
        // }


        $data = [
            //eng
            ['name' => 'Oxygen metabolism change', 'factor_id' => 1, 'type_id' => 1, 'language' => 'eng'],
            ['name' => 'DNA damage', 'factor_id' => 1, 'type_id' => 1, 'language' => 'ru'],
            ['name' => 'Oxygen metabolism change', 'factor_id' => 2, 'type_id' => 1, 'language' => 'eng'],
            ['name' => 'DNA damage', 'factor_id' => 2, 'type_id' => 1, 'language' => 'ru'],
        ];

        foreach ($data as $item)
        {
            FactorLanguage::create($item);
        }



        // for ($i = 0; $i < count($data); $i++) {
        //     DB::table($table)
        //         ->where('id', $i + 1)
        //         ->update($data[$i]);
        // }
    }
}
