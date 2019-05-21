<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_roles', function(Blueprint $table)
		{
			$table->foreign('role_id', 'FK_user_role_roles')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'FK_user_role_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_roles', function(Blueprint $table)
		{
			$table->dropForeign('FK_user_role_roles');
			$table->dropForeign('FK_user_role_users');
		});
	}

}
