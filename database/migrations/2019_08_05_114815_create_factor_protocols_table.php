<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactorProtocolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factor_protocols', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('factor_id')->unsigned()->default(1)->index('FK_factor_protocol_factors');
			$table->integer('protocol_id')->unsigned()->default(1)->index('FK_factor_protocol_protocols');
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
		Schema::drop('factor_protocols');
	}

}
