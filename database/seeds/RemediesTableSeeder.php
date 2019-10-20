<?php

use App\Models\Remedy;
use App\Models\Factor\Factor;
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
        DB::update("ALTER TABLE remedies AUTO_INCREMENT = 0;");

        factory(Remedy::class, 2)->create();

        $remedies = Remedy::all();
        $diseases = Disease::with('factors')->get();
        $skip = [];

        foreach($diseases as $disease){
            $attach = $remedies->random(rand(1,2));
            if($disease->factors()->count() > 0){
                foreach($disease->factors()->get() as $factor){
                    foreach($factor->protocols()->get() as $protocol){
                        if( !in_array($protocol->id,$skip) ){
                            $protocol->remedies()->attach($attach);
                            array_push($skip, $protocol->id);
                        }
                    }
                    $factor->remedies()->attach($attach);
                }
            }
            $disease->remedies()->attach($attach);
            //$remedies = $remedies->whereNotIn('id', $attach->pluck('id'));
        }
    }
}
