<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMarkerLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('marker_languages', function(Blueprint $table)
		{
			$table->foreign('marker_id', 'FK_marker_languages_markers')->references('id')->on('markers')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('marker_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_marker_languages_markers');
		});
	}

}
