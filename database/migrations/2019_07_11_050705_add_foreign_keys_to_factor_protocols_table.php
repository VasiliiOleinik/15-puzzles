<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFactorProtocolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('factor_protocols', function(Blueprint $table)
		{
			$table->foreign('factor_id', 'FK_factor_protocol_factors')->references('id')->on('factors')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('protocol_id', 'FK_factor_protocol_protocols')->references('id')->on('protocols')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('factor_protocols', function(Blueprint $table)
		{
			$table->dropForeign('FK_factor_protocol_factors');
			$table->dropForeign('FK_factor_protocol_protocols');
		});
	}

}
