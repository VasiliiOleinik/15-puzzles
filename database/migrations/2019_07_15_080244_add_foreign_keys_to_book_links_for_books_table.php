<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookLinksForBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_links_for_books', function(Blueprint $table)
		{
			$table->foreign('link_for_books_id', 'FK_book_link_for_books_links_for_books')->references('id')->on('links_for_books')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('book_id', 'FK_link_for_books_books')->references('id')->on('books')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_links_for_books', function(Blueprint $table)
		{
			$table->dropForeign('FK_book_link_for_books_links_for_books');
			$table->dropForeign('FK_link_for_books_books');
		});
	}

}
