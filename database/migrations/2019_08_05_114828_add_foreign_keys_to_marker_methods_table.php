<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMarkerMethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('marker_methods', function(Blueprint $table)
		{
			$table->foreign('marker_id', 'FK_marker_methods_markers')->references('id')->on('markers')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('method_id', 'FK_marker_methods_methods')->references('id')->on('methods')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('marker_methods', function(Blueprint $table)
		{
			$table->dropForeign('FK_marker_methods_markers');
			$table->dropForeign('FK_marker_methods_methods');
		});
	}

}
