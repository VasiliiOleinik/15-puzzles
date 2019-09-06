<?php

use Illuminate\Database\Seeder;
use App\Models\Category\CategoryForBooks;
use App\Models\Category\CategoryForBooksLanguage;
use Illuminate\Support\Facades\Config;

class CategoryForBooksLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableShort = 'category_for_books';
        $table = $tableShort.'_languages';
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');        
        for($i = 0; $i < CategoryForBooks::count(); $i++){
            factory(CategoryForBooksLanguage::class, 1 )->create();
        }
        Config::set('app.faker_locale', 'ru_RU');        
        for($i = 0; $i < CategoryForBooks::count(); $i++){
            factory(CategoryForBooksLanguage::class, 1 )->create();
        }
        for($i = CategoryForBooks::count() + 1; $i < CategoryForBooks::count()*2 + 1; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - CategoryForBooks::count()] );
        }
        //делаем одинаковыми имена
        foreach(CategoryForBooks::all() as $category){
            $category->name = CategoryForBooksLanguage::where('category_for_books_id','=',$category->id)
                                          ->where('language','=','eng')->first()->name;
            $category->save();
        }
    }
}
