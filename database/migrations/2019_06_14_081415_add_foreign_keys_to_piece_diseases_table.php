<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPieceDiseasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('piece_diseases', function(Blueprint $table)
		{
			$table->foreign('disease_id', 'FK_piece_diseases_diseases')->references('id')->on('diseases')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('piece_id', 'FK_piece_diseases_pieces')->references('id')->on('pieces')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('piece_diseases', function(Blueprint $table)
		{
			$table->dropForeign('FK_piece_diseases_diseases');
			$table->dropForeign('FK_piece_diseases_pieces');
		});
	}

}
