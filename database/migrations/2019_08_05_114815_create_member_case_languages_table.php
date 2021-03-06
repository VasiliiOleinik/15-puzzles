<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberCaseLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_case_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('language')->default('eng');
			$table->integer('member_case_id')->unsigned()->default(1)->index('FK_member_case_languages_member_cases');
			$table->string('title')->nullable();
			$table->longText('description')->nullable();
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
		Schema::drop('member_case_languages');
	}

}
