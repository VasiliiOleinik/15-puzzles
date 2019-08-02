<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProtocolRemediesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('protocol_remedies', function(Blueprint $table)
		{
			$table->foreign('protocol_id', 'FK_protocol_remedies_protocols')->references('id')->on('protocols')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('remedy_id', 'FK_protocol_remedies_remedies')->references('id')->on('remedies')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('protocol_remedies', function(Blueprint $table)
		{
			$table->dropForeign('FK_protocol_remedies_protocols');
			$table->dropForeign('FK_protocol_remedies_remedies');
		});
	}

}
