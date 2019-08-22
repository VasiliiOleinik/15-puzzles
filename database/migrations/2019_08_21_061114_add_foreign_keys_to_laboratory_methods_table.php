<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLaboratoryMethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('laboratory_methods', function(Blueprint $table)
		{
			$table->foreign('laboratory_id', 'FK_laboratory_methods_laboratories')->references('id')->on('laboratories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('method_id', 'FK_laboratory_methods_methods')->references('id')->on('methods')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('laboratory_methods', function(Blueprint $table)
		{
			$table->dropForeign('FK_laboratory_methods_laboratories');
			$table->dropForeign('FK_laboratory_methods_methods');
		});
	}

}
