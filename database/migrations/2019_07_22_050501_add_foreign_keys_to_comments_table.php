<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->foreign('member_case_id', 'FK_comments_member_cases')->references('id')->on('member_cases')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'FK_comments_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->dropForeign('FK_comments_member_cases');
			$table->dropForeign('FK_comments_users');
		});
	}

}
