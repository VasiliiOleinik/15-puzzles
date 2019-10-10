<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactorMarkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factor_markers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('factor_id')->unsigned()->default(1)->index('FK_factor_markers_factors');
			$table->integer('marker_id')->unsigned()->default(1)->index('FK_factor_markers_markers');
			$table->integer('is_active')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factor_markers');
	}

}
