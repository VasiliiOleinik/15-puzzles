<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('language', 10)->default('eng');
			$table->integer('tag_id')->unsigned()->default(1)->index('FK_tag_languages_tags');
			$table->string('name', 50)->default('--');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tag_languages');
	}

}
