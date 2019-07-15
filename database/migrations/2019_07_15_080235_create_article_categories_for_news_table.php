<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleCategoriesForNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_categories_for_news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id')->unsigned()->default(1)->index('FK_article_categories_for_news_articles');
			$table->integer('category_for_news_id')->unsigned()->default(1)->index('FK_article_categories_for_news_categories_for_news');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_categories_for_news');
	}

}
