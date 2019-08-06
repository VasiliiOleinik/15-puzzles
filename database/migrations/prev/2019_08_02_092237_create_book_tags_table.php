<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('book_id')->unsigned()->default(1)->index('FK_book_tags_books');
			$table->integer('tag_id')->unsigned()->default(1)->index('FK_book_tags_tags');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_tags');
	}

}
