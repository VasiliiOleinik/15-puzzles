<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Factor\Factor;
use App\Models\Category;

class FactorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factors')->delete();
        DB::update("ALTER TABLE factors AUTO_INCREMENT = 0;");

        factory(Factor::class, 22)->create();        
        
        $factor_names = [
            ['img' => 'img/svg/oxygen_metabolism.svg', 'type_id' => 1],
            ['img' => 'img/svg/dna.svg', 'type_id' => 1],
			['img' => 'img/svg/etiology.svg', 'type_id' => 1],
            ['img' => 'img/svg/hand.svg', 'type_id' => 3],
            ['img' => 'img/svg/detox.svg', 'type_id' => 2],
            ['img' => 'img/svg/voltage.svg', 'type_id' => 2],
            ['img' => 'img/svg/ph.svg', 'type_id' => 2],
            ['img' => 'img/svg/cellular.svg', 'type_id' => 2],
            ['img' => 'img/svg/cancer_cell_recognation.svg', 'type_id' => 3],
            ['img' => 'img/svg/reactivation.svg', 'type_id' => 3],
            ['img' => 'img/svg/connective.svg', 'type_id' => 3],
            ['img' => 'img/svg/cancer_cell_elimination.svg', 'type_id' => 3],
            ['img' => 'img/svg/free_radical.svg', 'type_id' => 4],
            ['img' => 'img/svg/cancer_cell_division.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            /*
            ['img' => 'img/svg/oxygen_metabolism.svg', 'type_id' => 1],
            ['img' => 'img/svg/dna.svg', 'type_id' => 1],
			['img' => 'img/svg/etiology.svg', 'type_id' => 1],
            ['img' => 'img/svg/hand.svg', 'type_id' => 3],
            ['img' => 'img/svg/detox.svg', 'type_id' => 2],
            ['img' => 'img/svg/voltage.svg', 'type_id' => 2],
            ['img' => 'img/svg/ph.svg', 'type_id' => 2],
            ['img' => 'img/svg/cellular.svg', 'type_id' => 2],
            ['img' => 'img/svg/cancer_cell_recognation.svg', 'type_id' => 3],
            ['img' => 'img/svg/reactivation.svg', 'type_id' => 3],
            ['img' => 'img/svg/connective.svg', 'type_id' => 3],
            ['img' => 'img/svg/cancer_cell_elimination.svg', 'type_id' => 3],
            ['img' => 'img/svg/free_radical.svg', 'type_id' => 4],
            ['img' => 'img/svg/cancer_cell_division.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'type_id' => 4],     
            */
        ];

        for($i = 0; $i < count($factor_names); $i++){

            DB::table('factors')
                ->where('id', $i + 1)
                ->update($factor_names[$i]);
        }
    }
}
