<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id')->unsigned()->default(1)->index('FK_article_tags_articles');
			$table->integer('tag_id')->unsigned()->default(1)->index('FK_article_tags_tags');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_tags');
	}

}
