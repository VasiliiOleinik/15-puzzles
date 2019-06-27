<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemediesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('remedies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50)->default('--');
			$table->text('content', 65535);
			$table->string('url')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('remedies');
	}

}
