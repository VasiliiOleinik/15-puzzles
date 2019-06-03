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

        $pieces = Piece::all();

        // Populate the pivot table
        Protocol::all()->each(function ($protocol) use ($pieces) { 
            $protocol->pieces()->attach(
                $pieces->random(
                    rand(1,  4 ))->pluck('id')->toArray()
                
            ); 
        });
    }
}
