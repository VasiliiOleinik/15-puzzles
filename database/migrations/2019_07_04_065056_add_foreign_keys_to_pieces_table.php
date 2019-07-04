<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPiecesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pieces', function(Blueprint $table)
		{
			$table->foreign('type_id', 'FK_pieces_types')->references('id')->on('types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pieces', function(Blueprint $table)
		{
			$table->dropForeign('FK_pieces_types');
		});
	}

}
