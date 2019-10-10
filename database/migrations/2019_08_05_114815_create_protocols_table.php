<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProtocolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('protocols', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('evidence_id')->unsigned()->default(1)->index('FK_protocols_evidences');
			$table->string('url', 191)->nullable();
            $table->integer('is_active')->default(1);
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
		Schema::drop('protocols');
	}

}
