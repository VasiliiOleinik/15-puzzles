<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoryForNewsLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('category_for_news_languages', function(Blueprint $table)
		{
			$table->foreign('category_for_news_id', 'FK_category_for_news_languages_categories_for_news')->references('id')->on('categories_for_news')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('category_for_news_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_category_for_news_languages_categories_for_news');
		});
	}

}
