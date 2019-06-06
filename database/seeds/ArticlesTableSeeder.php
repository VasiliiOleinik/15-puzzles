<?php

use App\Models\Article\Article;
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

        factory(Article::class, 50)->create();

        $tags = Tag::all();

        // Populate the pivot table
        Article::all()->each(function ($article) use ($tags) { 
            $article->tags()->attach(
                $tags->random(
                    rand(1,  6))->pluck('id')->toArray()
                
            ); 
        });
    }
}
