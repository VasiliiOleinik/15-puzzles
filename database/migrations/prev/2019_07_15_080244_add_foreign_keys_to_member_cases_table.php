<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMemberCasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_cases', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FK_cases_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			\Illuminate\Support\Facades\DB::statement('ALTER TABLE member_cases ADD FULLTEXT search(title, description, content)');			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_cases', function(Blueprint $table)
		{
			$table->dropForeign('FK_cases_users');
		});
	}

}
