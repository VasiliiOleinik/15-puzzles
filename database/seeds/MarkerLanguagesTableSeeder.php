<?php

use Illuminate\Database\Seeder;
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
    }
}
