<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticleCategoriesForNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article_categories_for_news', function(Blueprint $table)
		{
			$table->foreign('article_id', 'FK_articles_categories_for_news_articles')->references('id')->on('articles')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('category_for_news_id', 'FK_articles_categories_for_news_categories_for_news')->references('id')->on('categories_for_news')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article_categories_for_news', function(Blueprint $table)
		{
			$table->dropForeign('FK_articles_categories_for_news_articles');
			$table->dropForeign('FK_articles_categories_for_news_categories_for_news');
		});
	}

}
