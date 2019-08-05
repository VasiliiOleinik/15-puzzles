<?php

use Illuminate\Database\Seeder;
use App\Models\Method;
use App\Models\Marker\Marker;
use App\Models\Marker\MarkerLanguage;
use Illuminate\Support\Facades\Config;

class MarkerLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $tableShort = 'marker';
        $table = 'marker_languages';
        DB::table('marker_language_methods')->delete();
        DB::update("ALTER TABLE marker_language_methods AUTO_INCREMENT = 0;");
        DB::table('marker_languages')->delete();        
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');        
        for($i = 0; $i < Marker::count(); $i++){
            factory(MarkerLanguage::class, 1 )->create();
        }
        Config::set('app.faker_locale', 'ru_RU');        
        for($i = 0; $i < Marker::count(); $i++){
            factory(MarkerLanguage::class, 1 )->create();
        }
        for($i = Marker::count() + 1; $i < Marker::count()*2 + 1; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - Marker::count()] );
        }

        $methods = Method::all();
        // Populate the pivot table
        //MarkerLanguage::where('id','<',Marker::count() + 1)->each(function ($marker) use ($methods) {
        MarkerLanguage::withoutGlobalScopes()->get()->each(function ($marker) use ($methods) { 
            $marker->methods()->attach(
                $methods->random(
                    rand(1,  4 ))->pluck('id')->toArray()
                
            );
        });
        /*MarkerLanguage::where('id','>',Marker::count())->each(function ($marker) use ($methods) { 
            $marker->methods()->attach(
                //MarkerLanguage::find($marker->id - $count)->methods;
                $methods->random(
                    rand(1,  4 ))->pluck('id')->toArray()
                
            ); 
        });*/
    }
}
