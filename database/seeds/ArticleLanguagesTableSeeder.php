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
            factory(ArticleLanguage::class, 1 )->create();
        }
        Config::set('app.faker_locale', 'ru_RU');
        for($i = 0; $i < Article::count(); $i++){
            factory(ArticleLanguage::class, 1 )->create();
        }
        for($i = Article::count() + 1; $i < Article::count()*2 + 1; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - Article::count()] );
        }
        //делаем одинаковыми имена
        /* foreach(Article::all() as $article){
            $article->title = ArticleLanguage::where('article_id','=',$article->id)
                                          ->where('language','=','eng')->first()->title;
            $article->save();
        } */
    }
}
