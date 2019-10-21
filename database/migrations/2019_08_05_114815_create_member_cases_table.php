<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberCasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_cases', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('alias')->nullable();
			$table->bigInteger('user_id')->unsigned()->default(1)->index('FK_cases_users');
			$table->longText('img')->nullable();
			$table->string('status')->default('moderating');
			$table->boolean('anonym')->default(0);
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
		Schema::drop('member_cases');
	}

}
