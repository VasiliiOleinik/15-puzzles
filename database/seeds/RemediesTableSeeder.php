<?php

use App\Models\Remedy;
use App\Models\Piece\Piece;
use Illuminate\Database\Seeder;

class RemediesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('remedies')->delete();
        factory(Remedy::class, 1500)->create();


        $pieces = Piece::all();

        // Populate the pivot table
        Remedy::all()->each(function ($remedy) use ($pieces) { 
            $remedy->pieces()->attach(
                $pieces->random(
                    rand(1,  15 ))->pluck('id')->toArray()
                
            ); 
        });
    }
}
