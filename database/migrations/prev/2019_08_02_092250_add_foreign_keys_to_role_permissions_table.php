<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('role_permissions', function(Blueprint $table)
		{
			$table->foreign('permission_id', 'FK_role_permissions_permissions')->references('id')->on('permissions')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('role_id', 'FK_role_permissions_roles')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('role_permissions', function(Blueprint $table)
		{
			$table->dropForeign('FK_role_permissions_permissions');
			$table->dropForeign('FK_role_permissions_roles');
		});
	}

}
