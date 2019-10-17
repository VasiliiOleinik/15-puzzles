<?php

use Illuminate\Database\Seeder;

class OrgansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Organ::create([
            'name' => 'cell',
        ]);

        \App\Models\Organ::create([
            'name' => 'matrix',
        ]);

        \App\Models\Organ::create([
            'name' => 'organ',
        ]);

        \App\Models\Organ::create([
            'name' => 'organ_system',
        ]);
    }
}
