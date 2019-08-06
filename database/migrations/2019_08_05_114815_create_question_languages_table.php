<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('language', 10)->default('eng');
			$table->integer('question_id')->unsigned()->default(1)->index('FK_question_languages_questions');
			$table->string('name', 191)->nullable();
			$table->text('content')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('question_languages');
	}

}
