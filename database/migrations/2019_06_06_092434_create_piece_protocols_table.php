<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePieceProtocolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piece_protocols', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('piece_id')->unsigned()->default(1)->index('FK_piece_protocol_pieces');
			$table->integer('protocol_id')->unsigned()->default(1)->index('FK_piece_protocol_protocols');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('piece_protocols');
	}

}
