<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaboratoryMethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laboratory_methods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('laboratory_id')->unsigned()->default(1)->index('FK_laboratory_methods_laboratories');
			$table->integer('method_id')->unsigned()->default(1)->index('FK_laboratory_methods_methods');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('laboratory_methods');
	}

}
