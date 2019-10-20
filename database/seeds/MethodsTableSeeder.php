<?php

use Illuminate\Database\Seeder;
use App\Models\Method;

class MethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('methods')->delete();
        DB::update("ALTER TABLE methods AUTO_INCREMENT = 0;");

        $countMethods = 2;
        factory(Method::class, $countMethods)->create();
    }
}
