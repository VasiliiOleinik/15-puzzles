<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarkerLanguageMethodLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marker_language_method_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('marker_language_id')->unsigned()->default(1)->index('FK_marker_language_methods_markers');
			$table->integer('method_language_id')->unsigned()->default(1)->index('FK_marker_language_methods_methods');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('marker_language_method_languages');
	}

}
