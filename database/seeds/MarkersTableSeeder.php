<?php

use App\Models\Marker;
use App\Models\Piece\Piece;
use Illuminate\Database\Seeder;

class MarkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('markers')->delete();
        factory(Marker::class, 500)->create();


        $pieces = Piece::all();

        // Populate the pivot table
        Marker::all()->each(function ($marker) use ($pieces) { 
            $marker->pieces()->attach(
                $pieces->random(
                    rand(1,  8 ))->pluck('id')->toArray()
                
            ); 
        });
    }
}
