<?php

use Illuminate\Database\Seeder;
use App\Models\Category\CategoryForNews;
use App\Models\Category\CategoryForNewsLanguage;
use Illuminate\Support\Facades\Config;

class CategoryForNewsLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableShort = 'category_for_news';
        $table = $tableShort.'_languages';
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');
        for($i = 0; $i < CategoryForNews::count(); $i++){
            $category = factory(CategoryForNewsLanguage::class, 1 )->create();
            $category[0]->categoriesForNews->alias = URLify::filter($category[0]->name.' '.$category[0]->categoriesForNews->id, 190);
            $category[0]->categoriesForNews->save();
        }
        Config::set('app.faker_locale', 'ru_RU');
        for($i = 0; $i < CategoryForNews::count(); $i++){
            factory(CategoryForNewsLanguage::class, 1 )->create();
        }
        for($i = CategoryForNews::count() + 1; $i < CategoryForNews::count()*2 + 1; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - CategoryForNews::count()] );
        }
    }
}
