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

        $remedies = Remedy::all();

        // Populate the pivot table
        Piece::all()->each(function ($piece) use ($remedies) { 
            $piece->remedies()->attach(
                $remedies->random(
                    rand(1,  3 ))->pluck('id')->toArray()
                
            ); 
        });
    }
}
