<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiseaseProtocolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disease_protocols', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('disease_id')->unsigned()->default(1)->index('FK_disease_protocols_diseases');
			$table->integer('protocol_id')->unsigned()->default(1)->index('FK_disease_protocols_protocols');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('disease_protocols');
	}

}
