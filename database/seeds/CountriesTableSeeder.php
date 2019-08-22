<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $table = 'countries';
       DB::table($table)->delete();
       DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

       factory(Country::class, 3)->create();
    }
}
