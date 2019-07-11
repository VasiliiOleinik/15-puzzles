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
            ['img' => 'img/svg/oxygen_metabolism.svg', 'name' => 'Oxygen metabolism change', 'type_id' => 1],
            ['img' => 'img/svg/dna.svg', 'name' => 'DNA damage', 'type_id' => 1],
			['img' => 'img/svg/etiology.svg', 'name' => 'Etiology', 'type_id' => 1],
            ['img' => 'img/svg/hand.svg', 'name' => 'Looking up', 'type_id' => 3],
            ['img' => 'img/svg/detox.svg', 'name' => 'Detox', 'type_id' => 2],
            ['img' => 'img/svg/voltage.svg', 'name' => 'Cell voltage', 'type_id' => 2],
            ['img' => 'img/svg/ph.svg', 'name' => 'pH', 'type_id' => 2],
            ['img' => 'img/svg/cellular.svg', 'name' => 'Cellular metabolism', 'type_id' => 2],
            ['img' => 'img/svg/cancer_cell_recognation.svg', 'name' => 'Cancer cell recognition by immune system', 'type_id' => 3],
            ['img' => 'img/svg/reactivation.svg', 'name' => 'Reactivation of immune system', 'type_id' => 3],
            ['img' => 'img/svg/connective.svg', 'name' => 'Connective tissue recovery', 'type_id' => 3],
            ['img' => 'img/svg/cancer_cell_elimination.svg', 'name' => 'Canver cell ellimination', 'type_id' => 3],
            ['img' => 'img/svg/free_radical.svg', 'name' => 'Free Radical stress', 'type_id' => 4],
            ['img' => 'img/svg/cancer_cell_division.svg', 'name' => 'Cancer cell division', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'type_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'type_id' => 4],     
        ];

        for($i = 0; $i < count($factor_names); $i++){

            DB::table('factors')
                ->where('id', $i + 1)
                ->update($factor_names[$i]);
        }
    }
}
