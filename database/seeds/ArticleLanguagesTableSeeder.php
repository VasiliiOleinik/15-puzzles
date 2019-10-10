<?php

use Illuminate\Database\Seeder;
use App\Models\Article\Article;
use App\Models\Article\ArticleLanguage;
use Illuminate\Support\Facades\Config;

class ArticleLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableShort = 'article';
        $table = $tableShort.'_languages';
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');
        for($i = 0; $i < Article::count(); $i++){
            $article = factory(ArticleLanguage::class, 1 )->create();
            $article[0]->article->alias = URLify::filter($article[0]->title.' '.$article[0]->article->created_at.' '.$article[0]->article->id);
            $article[0]->article->save();
        }
        Config::set('app.faker_locale', 'ru_RU');
        for($i = 0; $i < Article::count(); $i++){
            $article = factory(ArticleLanguage::class, 1 )->create();
            $article[0]->article->alias = URLify::filter($article[0]->title.' '.$article[0]->article->created_at.' '.$article[0]->article->id);
            $article[0]->article->save();
        }
        for($i = Article::count() + 1; $i < Article::count()*2 + 1; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - Article::count()] );
        }
    }
}
