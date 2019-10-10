<?php

use Illuminate\Database\Seeder;
use App\Models\Method;
use App\Models\MethodLanguage;
use Illuminate\Support\Facades\Config;

class MethodLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableShort = 'method';
        $table = 'method_languages';
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');
        for($i = 0; $i < Method::count(); $i++){
            factory(MethodLanguage::class, 1 )->create();
        }
        Config::set('app.faker_locale', 'ru_RU');
        for($i = 0; $i < Method::count(); $i++){
            factory(MethodLanguage::class, 1 )->create();
        }
        for($i = Method::count() + 1; $i < Method::count()*2 + 1; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - Method::count()] );
        }
    }
}
