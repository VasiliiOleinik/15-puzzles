<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Piece\Piece;

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

        factory(Piece::class, 15)->create();        

        $piece_names = [
            ['img' => '0', 'name' => 'Oxygen metabolism change'],
            ['img' => '40', 'name' => 'DNA damage'],
			['img' => '80', 'name' => 'Etiology'],
            ['img' => '120', 'name' => 'Looking up'],
            ['img' => '160', 'name' => 'Detox'],
            ['img' => '200', 'name' => 'Cell voltage'],
            ['img' => '240', 'name' => 'pH'],
            ['img' => '280', 'name' => 'Cellular metabolism'],
            ['img' => '320', 'name' => 'Cancer cell recognition by immune system'],
            ['img' => '360', 'name' => 'Reactivation of immune system'],
            ['img' => '400', 'name' => 'Connective tissue recovery'],
            ['img' => '440', 'name' => 'Canver cell ellimination'],
            ['img' => '480', 'name' => 'Free Radical stress'],
            ['img' => '520', 'name' => 'Cancer cell division'],
            ['img' => '560', 'name' => 'Angiogenesis'],
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
