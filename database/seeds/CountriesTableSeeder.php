<?php

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Laboratory\Laboratory;

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

        $countries = Country::with('labaratories')->get();
        $laboratories = Laboratory::all();

        foreach ($countries as $country) {
            $country->labaratories()->attach($laboratories->random( rand(1,  2) ) );
        }
    }
}
