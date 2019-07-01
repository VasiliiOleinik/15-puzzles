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
        DB::update("ALTER TABLE protocols AUTO_INCREMENT = 0;");

        factory(Protocol::class, 100)->create();

        $protocols = Protocol::all();
        $diseases = Disease::with('pieces')->get();
        $skip = [];

        foreach($diseases as $disease){
            $attach = $protocols->random(rand(1,5));
            if($disease->pieces()->count() > 0){
                foreach($disease->pieces()->get() as $piece){
                    $piece->protocols()->attach($attach);                    
                }
            }
            $disease->protocols()->attach($attach);
            $protocols = $protocols->whereNotIn('id', $attach->pluck('id'));
        }        

    }
}
