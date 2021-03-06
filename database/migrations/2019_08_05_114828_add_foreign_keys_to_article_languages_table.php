<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticleLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article_languages', function(Blueprint $table)
		{
			$table->foreign('article_id', 'FK_article_languages_articles')->references('id')->on('articles')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_article_languages_articles');
		});
	}

}
