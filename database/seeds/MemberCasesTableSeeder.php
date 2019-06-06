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
        DB::table('member_cases')->delete();
        DB::update("ALTER TABLE member_cases AUTO_INCREMENT = 0;");

        factory(MemberCase::class, 20)->create();   
    }
}
