<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicalHistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medical_histories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('content', 65535)->nullable();
			$table->bigInteger('user_id')->unsigned()->default(1)->index('FK_medical_histories_users');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medical_histories');
	}

}
