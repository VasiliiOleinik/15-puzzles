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
            ['name' => 'Oxygen metabolism change'],
            ['name' => 'DNA damage'],
			['name' => 'Etiology'],
            ['name' => 'Looking up'],
            ['name' => 'Detox'],
            ['name' => 'Cell voltage'],
            ['name' => 'pH'],
            ['name' => 'Cellular metabolism'],
            ['name' => 'Cancer cell recognition by immune system'],
            ['name' => 'Reactivation of immune system'],
            ['name' => 'Connective tissue recovery'],
            ['name' => 'Canver cell ellimination'],
            ['name' => 'Free Radical stress'],
            ['name' => 'Cancer cell division'],
            ['name' => 'Angiogenesis'],
        ];
        //dd(count($piece_names));
        for($i = 0; $i < count($piece_names); $i++){

            DB::table('pieces')
                ->where('id', $i + 1)
                ->update($piece_names[$i]);
        }

		//Piece::update($piece_names);
    }
}
