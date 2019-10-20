<?php

use Illuminate\Database\Seeder;
use App\Models\Laboratory\Laboratory;
use App\Models\Method;

class LaboratoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $table = 'laboratories';
       DB::table($table)->delete();
       DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

       factory(Laboratory::class, 2)->create();

       $laboratories = Laboratory::with('methods')->get();
       $methods = Method::all();
       foreach ($laboratories as $laboratory) {
           $laboratory->methods()->attach($methods->random( rand(1,  2) ) );
       }
    }
}
