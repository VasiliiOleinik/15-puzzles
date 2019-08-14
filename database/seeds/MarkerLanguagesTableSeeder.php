<?php

use Illuminate\Database\Seeder;
use App\Models\MethodLanguage;
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
        DB::table('marker_language_method_languages')->delete();
        DB::update("ALTER TABLE marker_language_method_languages AUTO_INCREMENT = 0;");
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
        //делаем одинаковыми имена
        foreach(Marker::all() as $marker){
            $marker->name = MarkerLanguage::where('marker_id','=',$marker->id)
                                          ->where('language','=','eng')->first()->name;
            $marker->save();
        }
        $methods = MethodLanguage::withoutGlobalScopes()->get();        
        // Populate the pivot table
        MarkerLanguage::withoutGlobalScopes()->where('id','<',Marker::count() + 1)->each(function ($marker) use ($methods) {       
            $marker->methods()->attach(
                $methods->where('language','=','eng')->random(
                    rand(1,  4 ))->pluck('id')->toArray()
                
            );
        });
        $count = 1;
        MarkerLanguage::withoutGlobalScopes()->where('id','>',Marker::count())->each(function ($marker) use ($methods, $count) { 
            $marker->methods()->attach(
                $methods->where('language','=','ru')->random(
                    rand(1,  4 ))->pluck('id')->toArray()
                
            );
        });
    }
}
