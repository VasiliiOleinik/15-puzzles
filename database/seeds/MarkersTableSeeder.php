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

        factory(Marker::class, 40)->create();


        $methods = Method::all();

        // Populate the pivot table
        Marker::all()->each(function ($marker) use ($methods) { 
            $marker->methods()->attach(
                $methods->random(
                    rand(1,  4 ))->pluck('id')->toArray()
                
            ); 
        });

        $markers = Marker::all();
        $diseases = Disease::with('pieces')->get();
        $skip = [];

        foreach($diseases as $disease){
            $attach = $markers->random(rand(1,4));
            if($disease->pieces()->count() > 0){
                foreach($disease->pieces()->get() as $piece){
                    foreach($piece->protocols()->get() as $protocol){
                        if( !in_array($protocol->id,$skip) ){
                            $protocol->markers()->attach($attach);
                            array_push($skip, $protocol->id);
                        }
                    }
                    $piece->markers()->attach($attach);
                }
            }
            $disease->markers()->attach($attach);
            $markers = $markers->whereNotIn('id', $attach->pluck('id'));
        }
    }
}
