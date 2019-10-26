<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Factor\Factor;
use App\Models\Category;
use App\Models\Type;

class FactorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factors')->delete();
        DB::update("ALTER TABLE factors AUTO_INCREMENT = 0;");

        factory(Factor::class, 2)->create();

        $factor_names = [
            ['img' => '/img/svg/oxygen_metabolism.svg'],
            ['img' => '/img/svg/dna.svg'],
        ];

        for ($i = 0; $i < count($factor_names); $i++) {
            DB::table('factors')
                ->where('id', $i + 1)
                ->update($factor_names[$i]);
        }

        $factors = Factor::all();
        $types = Type::with('factors')->get();
        foreach ($types as $type) {
            $type->factors()->attach($factors->random(1, 2));
        }
    }
}
