<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiseaseProtocolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('disease_protocols', function(Blueprint $table)
		{
			$table->foreign('disease_id', 'FK_disease_protocols_diseases')->references('id')->on('diseases')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('protocol_id', 'FK_disease_protocols_protocols')->references('id')->on('protocols')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('disease_protocols', function(Blueprint $table)
		{
			$table->dropForeign('FK_disease_protocols_diseases');
			$table->dropForeign('FK_disease_protocols_protocols');
		});
	}

}
