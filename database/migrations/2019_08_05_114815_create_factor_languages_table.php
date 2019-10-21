<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactorLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factor_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('language')->default('eng');
			$table->integer('factor_id')->unsigned()->default(1)->index('FK_factor_languages_factors');
			$table->integer('type_id')->unsigned()->default(1)->index('FK_factor_languages_types');
			$table->string('name')->nullable();
            $table->text('abnormal_condition')->nullable();
            $table->text('normal_condition')->nullable();
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
		Schema::drop('factor_languages');
	}

}
