<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFactorDiseasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('factor_diseases', function(Blueprint $table)
		{
			$table->foreign('disease_id', 'FK_factor_diseases_diseases')->references('id')->on('diseases')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('factor_id', 'FK_factor_diseases_factors')->references('id')->on('factors')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('factor_diseases', function(Blueprint $table)
		{
			$table->dropForeign('FK_factor_diseases_diseases');
			$table->dropForeign('FK_factor_diseases_factors');
		});
	}

}
