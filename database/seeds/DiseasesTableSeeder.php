<?php

use App\Models\Factor\Factor;
use Illuminate\Database\Seeder;
use App\Models\Disease\Disease;

class DiseasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diseases')->delete();
        DB::update("ALTER TABLE diseases AUTO_INCREMENT = 0;");

        factory(Disease::class, 2)->create();

        $factors = Factor::all();
        $countFactors = Factor::count();
        $diseases = Disease::with('factors')->get();
        foreach ($diseases as $disease) {
            $disease->factors()->attach($factors->random( rand(1,  2 ) ) );
        }
    }
}
