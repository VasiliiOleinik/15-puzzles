<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMarkerLanguageMethodLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('marker_language_method_languages', function(Blueprint $table)
		{
			$table->foreign('marker_language_id', 'FK_marker_language_methods_markers')->references('id')->on('marker_languages')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('method_language_id', 'FK_marker_language_methods_methods')->references('id')->on('method_languages')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('marker_language_method_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_marker_language_methods_markers');
			$table->dropForeign('FK_marker_language_methods_methods');
		});
	}

}
