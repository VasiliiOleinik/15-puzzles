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
        
        //pivot table
        $categoriesForNews = CategoryForNews::all();
        $articles = Article::with('categoriesForNews')->get();
        foreach ($articles as $article) {
            $article->categoriesForNews()->attach($categoriesForNews->random( rand(1,  $countCategoriesForNews/2  ) ) );
        }        
    }
}
