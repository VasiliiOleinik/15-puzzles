<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProtocolRemediesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('protocol_remedies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('protocol_id')->unsigned()->default(1)->index('FK_protocol_remedies_protocols');
			$table->integer('remedy_id')->unsigned()->default(1)->index('FK_protocol_remedies_remedies');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('protocol_remedies');
	}

}
