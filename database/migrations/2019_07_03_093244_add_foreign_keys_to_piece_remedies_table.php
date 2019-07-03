<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPieceRemediesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('piece_remedies', function(Blueprint $table)
		{
			$table->foreign('piece_id', 'FK_piece_remedy_pieces')->references('id')->on('pieces')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('remedy_id', 'FK_piece_remedy_remedies')->references('id')->on('remedies')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('piece_remedies', function(Blueprint $table)
		{
			$table->dropForeign('FK_piece_remedy_pieces');
			$table->dropForeign('FK_piece_remedy_remedies');
		});
	}

}
