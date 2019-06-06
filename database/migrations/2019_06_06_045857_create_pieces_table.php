<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePiecesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pieces', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50)->default('--');
			$table->text('content', 65535);
			$table->integer('category_id')->unsigned()->index('FK_pieces_categories');
			$table->string('img', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pieces');
	}

}
