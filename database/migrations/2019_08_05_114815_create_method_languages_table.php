<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMethodLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('method_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('language')->default('eng');
			$table->integer('method_id')->unsigned()->default(1)->index('FK_method_languages_methods');
			$table->string('name')->nullable();
			$table->longText('content')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('method_languages');
	}

}
