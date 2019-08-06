<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFactorMarkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('factor_markers', function(Blueprint $table)
		{
			$table->foreign('factor_id', 'FK_factor_markers_factors')->references('id')->on('factors')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('marker_id', 'FK_factor_markers_markers')->references('id')->on('markers')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('factor_markers', function(Blueprint $table)
		{
			$table->dropForeign('FK_factor_markers_factors');
			$table->dropForeign('FK_factor_markers_markers');
		});
	}

}
