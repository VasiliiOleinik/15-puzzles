<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticleTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article_tags', function(Blueprint $table)
		{
			$table->foreign('article_id', 'FK_article_tags_articles')->references('id')->on('articles')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('tag_id', 'FK_article_tags_tags')->references('id')->on('tags')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article_tags', function(Blueprint $table)
		{
			$table->dropForeign('FK_article_tags_articles');
			$table->dropForeign('FK_article_tags_tags');
		});
	}

}
