<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookLinksForBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_links_for_books', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('book_id')->unsigned()->default(1)->index('FK_link_for_books_books');
			$table->integer('link_for_books_id')->unsigned()->default(1)->index('FK_book_link_for_books_links_for_books');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_links_for_books');
	}

}
