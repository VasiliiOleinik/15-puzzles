<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactorDiseasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factor_diseases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('factor_id')->unsigned()->default(1)->index('FK_factor_diseases_factors');
			$table->integer('disease_id')->unsigned()->default(1)->index('FK_factor_diseases_diseases');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factor_diseases');
	}

}
