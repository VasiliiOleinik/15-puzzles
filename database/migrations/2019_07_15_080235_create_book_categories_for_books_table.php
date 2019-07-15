<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookCategoriesForBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_categories_for_books', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('book_id')->unsigned()->default(1);
			$table->integer('category_for_books_id')->unsigned()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_categories_for_books');
	}

}
