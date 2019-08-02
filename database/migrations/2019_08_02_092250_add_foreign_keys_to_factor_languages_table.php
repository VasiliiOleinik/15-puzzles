<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFactorLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('factor_languages', function(Blueprint $table)
		{
			$table->foreign('factor_id', 'FK_factor_languages_factors')->references('id')->on('factors')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('type_id', 'FK_factor_languages_types')->references('id')->on('types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('factor_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_factor_languages_factors');
			$table->dropForeign('FK_factor_languages_types');
		});
	}

}
