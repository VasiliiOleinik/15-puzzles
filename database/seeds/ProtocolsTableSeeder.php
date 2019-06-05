<?php

use App\Models\Protocol\Protocol;
use App\Models\Piece\Piece;
use App\Models\Disease\Disease;
use App\Models\Remedy;
use App\Models\Marker;
use Illuminate\Database\Seeder;

class ProtocolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('protocols')->delete();
        factory(Protocol::class, 500)->create();

        $pieces = Piece::all();

        // Populate the pivot table
        Protocol::all()->each(function ($protocol) use ($pieces) { 
            $protocol->pieces()->attach(
                $pieces->random(
                    rand(1,  4 ))->pluck('id')->toArray()
                
            ); 
        });

        $diseases = Disease::all();

        // Populate the pivot table
        Protocol::all()->each(function ($protocol) use ($diseases) { 
            $protocol->diseases()->attach(
                $diseases->random(
                    rand(1,  2 ))->pluck('id')->toArray()
                
            ); 
        });

    }
}
