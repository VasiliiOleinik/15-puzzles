<?php

use App\Models\Category\CategoryForNews;
use App\Models\Article\Article;
use Illuminate\Database\Seeder;

class CategoriesForNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_for_news')->delete();
        DB::update("ALTER TABLE categories_for_news AUTO_INCREMENT = 0;");
        
        $countCategoriesForNews = 8;
        factory(CategoryForNews::class, $countCategoriesForNews)->create();
               
    }
}
