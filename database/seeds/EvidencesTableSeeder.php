<?php

use App\Models\Evidence;
use Illuminate\Database\Seeder;

class EvidencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evidences')->delete();
        DB::update("ALTER TABLE evidences AUTO_INCREMENT = 0;");

        factory(Evidence::class, 3)->create();  

        $names = [
            ['name' => 'low', 'color' => 'red'],
            ['name' => 'medium' , 'color' => 'orange'],
            ['name' => 'hight' , 'color' => 'green'],            
        ];

         for($i = 0; $i < count($names); $i++){

            DB::table('evidences')
                ->where('id', $i + 1)
                ->update($names[$i]);
        }
    }
}
