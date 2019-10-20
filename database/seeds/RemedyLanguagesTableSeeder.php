<?php

use Illuminate\Database\Seeder;
use App\Models\Remedy;
use App\Models\RemedyLanguage;
use Illuminate\Support\Facades\Config;

class RemedyLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableShort = 'remedy';
        $table = 'remedy_languages';
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');
        for($i = 0; $i < Remedy::count(); $i++){
            factory(RemedyLanguage::class, 1 )->create();
        }
        Config::set('app.faker_locale', 'ru_RU');
        for($i = 0; $i < Remedy::count(); $i++){
            factory(RemedyLanguage::class, 1 )->create();
        }
        for($i = Remedy::count() + 1; $i < Remedy::count()+2; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - Remedy::count()] );
        }
    }
}
