<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactorRemediesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factor_remedies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('factor_id')->unsigned()->default(1)->index('FK_factor_remedy_factors');
			$table->integer('remedy_id')->unsigned()->default(1)->index('FK_factor_remedy_remedies');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factor_remedies');
	}

}
