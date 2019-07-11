<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiseaseRemediesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disease_remedies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('disease_id')->unsigned()->default(1)->index('FK_disease_remedies_diseases');
			$table->integer('remedy_id')->unsigned()->default(1)->index('FK_disease_remedies_remedies');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('disease_remedies');
	}

}
