<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPieceProtocolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('piece_protocols', function(Blueprint $table)
		{
			$table->foreign('piece_id', 'FK_piece_protocol_pieces')->references('id')->on('pieces')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('protocol_id', 'FK_piece_protocol_protocols')->references('id')->on('protocols')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('piece_protocols', function(Blueprint $table)
		{
			$table->dropForeign('FK_piece_protocol_pieces');
			$table->dropForeign('FK_piece_protocol_protocols');
		});
	}

}
