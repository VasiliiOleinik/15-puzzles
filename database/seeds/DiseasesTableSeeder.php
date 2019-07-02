<?php

use App\Models\Piece\Piece;
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
        DB::update("ALTER TABLE diseases AUTO_INCREMENT = 0;");

        factory(Disease::class, 7)->create();        

        $disease_names = [

            ['img' => '600', 'name' => 'disease_1'],
            ['img' => '640', 'name' => 'disease_2'],
            ['img' => '680', 'name' => 'disease_3'],
            ['img' => '720', 'name' => 'disease_4'],
            ['img' => '760', 'name' => 'disease_5'],
            ['img' => '800', 'name' => 'disease_6'],
            ['img' => '840', 'name' => 'disease_7'],
        /*
            ['img' => 'disease_1.png', 'name' => 'disease_1'],
            ['img' => 'disease_1.png', 'name' => 'disease_2'],
            ['img' => 'disease_1.png', 'name' => 'disease_3'],
            ['img' => 'disease_1.png', 'name' => 'disease_4'],
            ['img' => 'disease_1.png', 'name' => 'disease_5'],
            ['img' => 'disease_1.png', 'name' => 'disease_6'],
            ['img' => 'disease_1.png', 'name' => 'disease_7'],
            */
        ];

        for($i = 0; $i < count($disease_names); $i++){

            DB::table('diseases')
                ->where('id', $i + 1)
                ->update($disease_names[$i]);
        }

        $pieces = Piece::all();
        $countPieces = Piece::count();
        $diseases = Disease::with('pieces')->get();
        foreach ($diseases as $disease) {
            $disease->pieces()->attach($pieces->random( rand(1,  8 ) ) );
        }
    }
}
