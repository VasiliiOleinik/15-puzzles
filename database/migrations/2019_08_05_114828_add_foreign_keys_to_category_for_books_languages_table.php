<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoryForBooksLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('category_for_books_languages', function(Blueprint $table)
		{
			$table->foreign('category_for_books_id', 'FK_category_for_books_languages_categories_for_books')->references('id')->on('categories_for_books')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('category_for_books_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_category_for_books_languages_categories_for_books');
		});
	}

}
