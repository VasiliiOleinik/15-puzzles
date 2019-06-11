<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiseaseMarkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('disease_markers', function(Blueprint $table)
		{
			$table->foreign('disease_id', 'FK_disease_markers_diseases')->references('id')->on('diseases')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('marker_id', 'FK_disease_markers_markers')->references('id')->on('markers')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('disease_markers', function(Blueprint $table)
		{
			$table->dropForeign('FK_disease_markers_diseases');
			$table->dropForeign('FK_disease_markers_markers');
		});
	}

}
