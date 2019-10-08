<?php

use Illuminate\Database\Seeder;

class SeedRelationFactorsOrgan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factors = \App\Models\Factor\Factor::all();
        $organs = \App\Models\Organ::all();
        foreach ($factors as $factor){
            foreach ($organs as $organ){
                \App\Models\FactorOrgan::create([
                    'factors_id'=>$factor->id,
                    'organs_id'=>$organ->id,
                ]);
            }
        }
    }
}
