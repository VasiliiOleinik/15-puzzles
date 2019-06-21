<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProtocolMarkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('protocol_markers', function(Blueprint $table)
		{
			$table->foreign('marker_id', 'FK_protocol_markers_markers')->references('id')->on('markers')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('protocol_id', 'FK_protocol_markers_protocols')->references('id')->on('protocols')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('protocol_markers', function(Blueprint $table)
		{
			$table->dropForeign('FK_protocol_markers_markers');
			$table->dropForeign('FK_protocol_markers_protocols');
		});
	}

}
