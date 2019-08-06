<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProtocolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('protocols', function(Blueprint $table)
		{
			$table->foreign('evidence_id', 'FK_protocols_evidences')->references('id')->on('evidences')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('protocols', function(Blueprint $table)
		{
			$table->dropForeign('FK_protocols_evidences');
		});
	}

}
