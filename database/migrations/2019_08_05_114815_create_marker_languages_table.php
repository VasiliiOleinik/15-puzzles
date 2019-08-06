<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarkerLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marker_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('language', 10)->default('eng');
			$table->integer('marker_id')->unsigned()->default(1)->index('FK_marker_languages_markers');
			$table->string('name', 50)->nullable();
			$table->text('content', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('marker_languages');
	}

}
