<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_id')->unsigned()->default(1)->index('FK_role_permissions_roles');
			$table->integer('permission_id')->unsigned()->default(1)->index('FK_role_permissions_permissions');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_permissions');
	}

}
