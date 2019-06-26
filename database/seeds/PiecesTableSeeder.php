<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Piece\Piece;
use App\Models\Category;

class PiecesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pieces')->delete();
        DB::update("ALTER TABLE pieces AUTO_INCREMENT = 0;");

        factory(Piece::class, 22)->create();        
        
        $piece_names = [
            ['img' => 'img/svg/oxygen_metabolism.svg', 'name' => 'Oxygen metabolism change', 'category_id' => 1],
            ['img' => 'img/svg/dna.svg', 'name' => 'DNA damage', 'category_id' => 1],
			['img' => 'img/svg/etiology.svg', 'name' => 'Etiology', 'category_id' => 1],
            ['img' => 'img/svg/hand.svg', 'name' => 'Looking up', 'category_id' => 3],
            ['img' => 'img/svg/detox.svg', 'name' => 'Detox', 'category_id' => 2],
            ['img' => 'img/svg/voltage.svg', 'name' => 'Cell voltage', 'category_id' => 2],
            ['img' => 'img/svg/ph.svg', 'name' => 'pH', 'category_id' => 2],
            ['img' => 'img/svg/cellular.svg', 'name' => 'Cellular metabolism', 'category_id' => 2],
            ['img' => 'img/svg/cancer_cell_recognation.svg', 'name' => 'Cancer cell recognition by immune system', 'category_id' => 3],
            ['img' => 'img/svg/reactivation.svg', 'name' => 'Reactivation of immune system', 'category_id' => 3],
            ['img' => 'img/svg/connective.svg', 'name' => 'Connective tissue recovery', 'category_id' => 3],
            ['img' => 'img/svg/cancer_cell_elimination.svg', 'name' => 'Canver cell ellimination', 'category_id' => 3],
            ['img' => 'img/svg/free_radical.svg', 'name' => 'Free Radical stress', 'category_id' => 4],
            ['img' => 'img/svg/cancer_cell_division.svg', 'name' => 'Cancer cell division', 'category_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'category_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'category_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'category_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'category_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'category_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'category_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'category_id' => 4],
            ['img' => 'img/svg/angiogenesis.svg', 'name' => 'Angiogenesis', 'category_id' => 4],
        /*
            ['img' => 'piece_1.png', 'name' => 'Oxygen metabolism change'],
            ['img' => 'piece_2.png', 'name' => 'DNA damage'],
			['img' => 'piece_3.png', 'name' => 'Etiology'],
            ['img' => 'piece_4.png', 'name' => 'Looking up'],
            ['img' => 'piece_5.png', 'name' => 'Detox'],
            ['img' => 'piece_6.png', 'name' => 'Cell voltage'],
            ['img' => 'piece_7.png', 'name' => 'pH'],
            ['img' => 'piece_8.png', 'name' => 'Cellular metabolism'],
            ['img' => 'piece_9.png', 'name' => 'Cancer cell recognition by immune system'],
            ['img' => 'piece_10.png', 'name' => 'Reactivation of immune system'],
            ['img' => 'piece_11.png', 'name' => 'Connective tissue recovery'],
            ['img' => 'piece_12.png', 'name' => 'Canver cell ellimination'],
            ['img' => 'piece_13.png', 'name' => 'Free Radical stress'],
            ['img' => 'piece_14.png', 'name' => 'Cancer cell division'],
            ['img' => 'piece_15.png', 'name' => 'Angiogenesis'],
        */
        ];

        for($i = 0; $i < count($piece_names); $i++){

            DB::table('pieces')
                ->where('id', $i + 1)
                ->update($piece_names[$i]);
        }
    }
}
