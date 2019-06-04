<?php

use Illuminate\Database\Seeder;
use App\Models\Disease\Disease;

class DiseasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diseases')->delete();
        DB::update("ALTER TABLE diseases AUTO_INCREMENT = 16;");

        factory(Disease::class, 7)->create();        

        $disease_names = [
            ['img' => 'disease_1.png', 'name' => 'disease_1'],
            ['img' => 'disease_1.png', 'name' => 'disease_2'],
            ['img' => 'disease_1.png', 'name' => 'disease_3'],
            ['img' => 'disease_1.png', 'name' => 'disease_4'],
            ['img' => 'disease_1.png', 'name' => 'disease_5'],
            ['img' => 'disease_1.png', 'name' => 'disease_6'],
            ['img' => 'disease_1.png', 'name' => 'disease_7'],
            
        ];

        for($i = 0; $i < count($disease_names); $i++){

            DB::table('diseases')
                ->where('id', $i + 1 + 15)
                ->update($disease_names[$i]);
        }
    }
}
