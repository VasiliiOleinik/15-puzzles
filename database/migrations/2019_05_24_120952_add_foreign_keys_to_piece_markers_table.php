<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPieceMarkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('piece_markers', function(Blueprint $table)
		{
			$table->foreign('marker_id', 'FK_piece_markers_markers')->references('id')->on('markers')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('piece_id', 'FK_piece_markers_pieces')->references('id')->on('pieces')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('piece_markers', function(Blueprint $table)
		{
			$table->dropForeign('FK_piece_markers_markers');
			$table->dropForeign('FK_piece_markers_pieces');
		});
	}

}
