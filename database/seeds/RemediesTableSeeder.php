<?php

use App\Models\Remedy;
use App\Models\Piece\Piece;
use App\Models\Disease\Disease;
use App\Models\Protocol\Protocol;
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
        factory(Remedy::class, 500)->create();


        $pieces = Piece::all();

        // Populate the pivot table
        Remedy::all()->each(function ($remedy) use ($pieces) { 
            $remedy->pieces()->attach(
                $pieces->random(
                    rand(1,  4 ))->pluck('id')->toArray()
                
            ); 
        });

         $diseases = Disease::all();

        // Populate the pivot table
        Remedy::all()->each(function ($remedy) use ($diseases) { 
            $remedy->diseases()->attach(
                $diseases->random(
                    rand(1,  2 ))->pluck('id')->toArray()
                
            ); 
        });

        $protocols = Protocol::all();

        // Populate the pivot table
        Remedy::all()->each(function ($remedy) use ($protocols) { 
            $remedy->protocols()->attach(
                $protocols->random(
                    rand(1,  20 ))->pluck('id')->toArray()
                
            ); 
        });
    }
}
