<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('nickname', 200)->nullable();
			$table->string('first_name', 200)->nullable();
			$table->string('middle_name', 200)->nullable();
			$table->string('last_name', 200)->nullable();
			$table->string('email', 200)->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password', 200);
			$table->string('remember_token', 100)->nullable();
			$table->string('img', 200)->nullable();
			$table->integer('role_id')->unsigned()->default(1)->index('FK_users_roles');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
