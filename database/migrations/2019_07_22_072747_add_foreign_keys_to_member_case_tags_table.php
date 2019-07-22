<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMemberCaseTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_case_tags', function(Blueprint $table)
		{
			$table->foreign('member_case_id', 'FK_member_case_tags_member_cases')->references('id')->on('member_cases')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('tag_id', 'FK_member_case_tags_tags')->references('id')->on('tags')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_case_tags', function(Blueprint $table)
		{
			$table->dropForeign('FK_member_case_tags_member_cases');
			$table->dropForeign('FK_member_case_tags_tags');
		});
	}

}
