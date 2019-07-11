<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFactorRemediesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('factor_remedies', function(Blueprint $table)
		{
			$table->foreign('factor_id', 'FK_factor_remedy_factors')->references('id')->on('factors')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('remedy_id', 'FK_factor_remedy_remedies')->references('id')->on('remedies')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('factor_remedies', function(Blueprint $table)
		{
			$table->dropForeign('FK_factor_remedy_factors');
			$table->dropForeign('FK_factor_remedy_remedies');
		});
	}

}
