<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProtocolMarkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('protocol_markers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('protocol_id')->unsigned()->default(1)->index('FK_protocol_markers_protocols');
			$table->integer('marker_id')->unsigned()->default(1)->index('FK_protocol_markers_markers');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('protocol_markers');
	}

}
