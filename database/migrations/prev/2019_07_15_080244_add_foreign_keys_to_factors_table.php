<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFactorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('factors', function(Blueprint $table)
		{
			$table->foreign('type_id', 'FK_factors_types')->references('id')->on('types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('factors', function(Blueprint $table)
		{
			$table->dropForeign('FK_factors_types');
		});
	}

}
