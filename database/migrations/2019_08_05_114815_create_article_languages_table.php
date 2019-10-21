<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('language', 10)->default('eng');
			$table->integer('article_id')->unsigned()->default(1)->index('FK_article_languages_articles');
			$table->string('title')->nullable();
			$table->longText('description')->nullable();
			$table->longText('content')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_languages');
	}

}
