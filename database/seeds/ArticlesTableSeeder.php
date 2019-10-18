<?php

use App\Models\Article\Article;
use App\Models\Category\CategoryForNews;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();
        DB::update("ALTER TABLE articles AUTO_INCREMENT = 0;");

        factory(Article::class, 77)->create();

        $tags = Tag::all();
        $categoriesForNews = CategoryForNews::all();

        // Populate the pivot table
        Article::all()->each(function ($article) use ($tags) {
            $article->tags()->attach(
                $tags->random(
                    rand(6, 22))
                    ->pluck('id')
                    ->toArray()
            );
        });

        // Populate the pivot table
        Article::all()->each(function ($article) use ($categoriesForNews) {
            $article->categoriesForNews()->sync(
                $categoriesForNews->random(
                    rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
