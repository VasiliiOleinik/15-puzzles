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

        $markers = Marker::all();

        // Populate the pivot table
        Piece::all()->each(function ($piece) use ($markers) { 
            $piece->markers()->attach(
                $markers->random(
                    rand(1,  3 ))->pluck('id')->toArray()
                
            ); 
        });
    }
}
