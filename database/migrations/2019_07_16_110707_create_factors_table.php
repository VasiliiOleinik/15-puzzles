<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50)->default('--');
			$table->text('content', 65535);
			$table->integer('type_id')->unsigned()->default(1)->index('FK_factors_types');
			$table->string('img', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factors');
	}

}