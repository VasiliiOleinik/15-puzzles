<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_tags', function(Blueprint $table)
		{
			$table->foreign('book_id', 'FK_book_tags_books')->references('id')->on('books')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('tag_id', 'FK_book_tags_tags')->references('id')->on('tags')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_tags', function(Blueprint $table)
		{
			$table->dropForeign('FK_book_tags_books');
			$table->dropForeign('FK_book_tags_tags');
		});
	}

}
