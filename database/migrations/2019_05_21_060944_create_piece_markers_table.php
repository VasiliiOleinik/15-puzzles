<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePieceMarkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piece_markers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('piece_id')->unsigned()->default(1)->index('FK_piece_markers_pieces');
			$table->integer('marker_id')->unsigned()->default(1)->index('FK_piece_markers_markers');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('piece_markers');
	}

}
