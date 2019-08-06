<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMemberCaseLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_case_languages', function(Blueprint $table)
		{
			$table->foreign('member_case_id', 'FK_member_case_languages_member_cases')->references('id')->on('member_cases')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_case_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_member_case_languages_member_cases');
		});
	}

}
