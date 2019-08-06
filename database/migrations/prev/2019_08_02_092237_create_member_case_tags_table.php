<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberCaseTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_case_tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_case_id')->unsigned()->default(1)->index('FK_member_case_tags_member_cases');
			$table->integer('tag_id')->unsigned()->default(1)->index('FK_member_case_tags_tags');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_case_tags');
	}

}
