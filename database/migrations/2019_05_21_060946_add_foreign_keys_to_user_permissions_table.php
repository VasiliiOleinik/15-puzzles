<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_permissions', function(Blueprint $table)
		{
			$table->foreign('permission_id', 'FK_user_permission_permissions')->references('id')->on('permissions')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'FK_user_permission_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_permissions', function(Blueprint $table)
		{
			$table->dropForeign('FK_user_permission_permissions');
			$table->dropForeign('FK_user_permission_users');
		});
	}

}
