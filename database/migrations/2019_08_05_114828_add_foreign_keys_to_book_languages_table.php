<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_languages', function(Blueprint $table)
		{
			$table->foreign('book_id', 'FK_book_languages_books')->references('id')->on('books')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_book_languages_books');
		});
	}

}
