<?php

use App\Models\Marker\Marker;
use App\Models\Method;
use App\Models\Factor\Factor;
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

        factory(Marker::class, 2)->create();


        $methods = Method::all();

        // Populate the pivot table
        Marker::all()->each(function ($marker) use ($methods) {
            $marker->methods()->attach(
                $methods->random(
                    rand(1, 2 ))->pluck('id')->toArray()

            );
        });

        /*$c1 = DB::table('marker_methods')->select("SELECT * from table")

        foreach($c1 as $record){

            DB::table('marker_methods')>insert(get_object_vars($record))

        }*/

        $markers = Marker::all();
        $diseases = Disease::with('factors')->get();
        $skip = [];

        foreach($diseases as $disease){
            $attach = $markers->random(rand(1,2));
            if($disease->factors()->count() > 0){
                foreach($disease->factors()->get() as $factor){
                    foreach($factor->protocols()->get() as $protocol){
                        if( !in_array($protocol->id,$skip) ){
                            $protocol->markers()->attach($attach);
                            array_push($skip, $protocol->id);
                        }
                    }
                    $factor->markers()->attach($attach);
                }
            }
            $disease->markers()->attach($attach);
            ;
        }
    }
}
