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

        $countMethods = 20;
        factory(Method::class, $countMethods)->create();

        for($i = 0; $i < $countMethods; $i++){

            DB::table('methods')
                ->where('id', $i + 1)
                ->update(['name' => 'Method '.($i+1)]);
        }
    }
}
