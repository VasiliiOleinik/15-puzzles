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
			$table->foreign('type_id', 'FK_factors_factors')->references('id')->on('factors')->onUpdate('CASCADE')->onDelete('CASCADE');
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
			$table->dropForeign('FK_factors_factors');
		});
	}

}
