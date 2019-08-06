<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProtocolLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('protocol_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('language', 10)->default('eng');
			$table->integer('protocol_id')->unsigned()->default(1)->index('FK_protocol_languages_protocols');
			$table->integer('evidence_id')->unsigned()->default(1)->index('FK_protocol_languages_evidences');
			$table->string('name', 50)->nullable();
			$table->text('content', 65535)->nullable();
			$table->string('subtitle', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('protocol_languages');
	}

}
