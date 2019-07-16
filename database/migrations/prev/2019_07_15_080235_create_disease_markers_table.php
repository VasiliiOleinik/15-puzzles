<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiseaseMarkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disease_markers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('disease_id')->unsigned()->default(1)->index('FK_disease_markers_diseases');
			$table->integer('marker_id')->unsigned()->default(1)->index('FK_disease_markers_markers');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('disease_markers');
	}

}
