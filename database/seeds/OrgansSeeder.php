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
        for ($x = 0; $x < 5; $x++) {
            \App\Models\Organ::create([
                'name'=>'test'.$x,
                'y-coordinate'=>rand(100, 500),
                'z-coordinate'=>rand(100, 500),
                'parent-coordinate'=>rand(100, 500)
            ]);
        }
    }
}
