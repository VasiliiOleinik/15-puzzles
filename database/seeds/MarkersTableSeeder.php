<?php

use App\Models\Marker\Marker;
use App\Models\Method;
use App\Models\Piece\Piece;
use App\Models\Disease\Disease;
use App\Models\Protocol\Protocol;
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
        DB::update("ALTER TABLE markers AUTO_INCREMENT = 0;");

        factory(Marker::class, 500)->create();


        $methods = Method::all();

        // Populate the pivot table
        Marker::all()->each(function ($marker) use ($methods) { 
            $marker->methods()->attach(
                $methods->random(
                    rand(1,  4 ))->pluck('id')->toArray()
                
            ); 
        });

        $pieces = Piece::all();

        // Populate the pivot table
        Marker::all()->each(function ($marker) use ($pieces) { 
            $marker->pieces()->attach(
                $pieces->random(
                    rand(1,  5 ))->pluck('id')->toArray()
                
            ); 
        });

        $diseases = Disease::all();

        // Populate the pivot table
        Marker::all()->each(function ($marker) use ($diseases) { 
            $marker->diseases()->attach(
                $diseases->random(
                    rand(1,  2 ))->pluck('id')->toArray()
                
            ); 
        });

        $protocols = Protocol::all();

        // Populate the pivot table
        Marker::all()->each(function ($marker) use ($protocols) { 
            $marker->protocols()->attach(
                $protocols->random(
                    rand(1,  60 ))->pluck('id')->toArray()
                
            ); 
        });
    }
}
