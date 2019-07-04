<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePieceDiseasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piece_diseases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('piece_id')->unsigned()->default(1)->index('FK_piece_diseases_pieces');
			$table->integer('disease_id')->unsigned()->default(1)->index('FK_piece_diseases_diseases');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('piece_diseases');
	}

}
