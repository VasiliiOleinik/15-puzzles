<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiseaseLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('disease_languages', function(Blueprint $table)
		{
			$table->foreign('disease_id', 'FK_disease_languages_diseases')->references('id')->on('diseases')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('disease_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_disease_languages_diseases');
		});
	}

}
