<?php

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\QuestionLanguage;
use Illuminate\Support\Facades\Config;

class QuestionLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableShort = 'question';
        $table = $tableShort.'_languages';
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');        
        for($i = 0; $i < Question::count(); $i++){
            factory(QuestionLanguage::class, 1 )->create();
        }
        Config::set('app.faker_locale', 'ru_RU');        
        for($i = 0; $i < Question::count(); $i++){
            factory(QuestionLanguage::class, 1 )->create();
        }
        for($i = Question::count() + 1; $i < Question::count()*2 + 1; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - Question::count()] );
        }    
    }
}
