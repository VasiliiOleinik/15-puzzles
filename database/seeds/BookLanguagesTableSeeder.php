<?php

use Illuminate\Database\Seeder;
use App\Models\Book\Book;
use App\Models\Book\BookLanguage;
use Illuminate\Support\Facades\Config;

class BookLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableShort = 'book';
        $table = $tableShort.'_languages';
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');
        for($i = 0; $i < Book::count(); $i++){
            factory(BookLanguage::class, 1 )->create();
        }
        Config::set('app.faker_locale', 'ru_RU');
        for($i = 0; $i < Book::count(); $i++){
            factory(BookLanguage::class, 1 )->create();
        }
        for($i = Book::count() + 1; $i < Book::count()+2; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - Book::count()] );
        }
    }
}
