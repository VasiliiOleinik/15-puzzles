<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarkerMethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marker_methods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('marker_id')->unsigned()->default(1)->index('FK_marker_methods_markers');
			$table->integer('method_id')->unsigned()->default(1)->index('FK_marker_methods_methods');
            $table->integer('is_active')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('marker_methods');
	}

}
