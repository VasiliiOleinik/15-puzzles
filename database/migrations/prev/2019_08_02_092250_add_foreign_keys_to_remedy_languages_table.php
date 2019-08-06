<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRemedyLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('remedy_languages', function(Blueprint $table)
		{
			$table->foreign('remedy_id', 'FK_remedy_languages_remedies')->references('id')->on('remedies')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('remedy_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_remedy_languages_remedies');
		});
	}

}
