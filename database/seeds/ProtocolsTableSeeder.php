<?php

use App\Models\Protocol\Protocol;
use App\Models\Factor\Factor;
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

        $factors = Factor::all();
        $protocols = Protocol::with('factors')->get();

        foreach ($protocols as $protocol) {
            $attach = $factors->random(rand(1, 2));
            $protocol->factors()->attach($attach);
        }

        $diseases = Disease::with('factors')->get();
        $skip = [];

        foreach ($diseases as $disease) {
            $attach = $protocols->random(rand(1, 5));
            if ($disease->factors()->count() > 0) {
                foreach ($disease->factors()->get() as $factor) {
                    $factor->protocols()->attach($attach);
                }
            }
            $disease->protocols()->attach($attach);
            $protocols = $protocols->whereNotIn('id', $attach->pluck('id'));
        }

    }
}
