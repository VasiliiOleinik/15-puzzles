<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProtocolLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('protocol_languages', function(Blueprint $table)
		{
			$table->foreign('evidence_id', 'FK_protocol_languages_evidences')->references('id')->on('evidences')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('protocol_id', 'FK_protocol_languages_protocols')->references('id')->on('protocols')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('protocol_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_protocol_languages_evidences');
			$table->dropForeign('FK_protocol_languages_protocols');
		});
	}

}
