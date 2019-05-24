<?php

use Illuminate\Database\Seeder;
use App\Models\MemberCase;

class MemberCasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MemberCase::class, 20)->create();   
    }
}
