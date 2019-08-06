<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMethodLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('method_languages', function(Blueprint $table)
		{
			$table->foreign('method_id', 'FK_method_languages_methods')->references('id')->on('methods')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('method_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_method_languages_methods');
		});
	}

}
