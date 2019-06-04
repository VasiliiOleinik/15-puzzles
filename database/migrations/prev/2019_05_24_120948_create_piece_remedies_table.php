<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePieceRemediesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piece_remedies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('piece_id')->unsigned()->default(1)->index('FK_piece_remedy_pieces');
			$table->integer('remedy_id')->unsigned()->default(1)->index('FK_piece_remedy_remedies');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('piece_remedies');
	}

}
