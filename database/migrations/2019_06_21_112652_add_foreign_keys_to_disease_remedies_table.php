<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiseaseRemediesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('disease_remedies', function(Blueprint $table)
		{
			$table->foreign('disease_id', 'FK_disease_remedies_diseases')->references('id')->on('diseases')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('remedy_id', 'FK_disease_remedies_remedies')->references('id')->on('remedies')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('disease_remedies', function(Blueprint $table)
		{
			$table->dropForeign('FK_disease_remedies_diseases');
			$table->dropForeign('FK_disease_remedies_remedies');
		});
	}

}
