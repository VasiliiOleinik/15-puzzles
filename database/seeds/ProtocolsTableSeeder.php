<?php

use App\Models\Protocol;
use App\Models\Piece\Piece;
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

        $protocols = Protocol::all();

        // Populate the pivot table
        Piece::all()->each(function ($piece) use ($protocols) { 
            $piece->protocols()->attach(
                $protocols->random(
                    rand(1,  3 ))->pluck('id')->toArray()
                
            ); 
        });
    }
}
