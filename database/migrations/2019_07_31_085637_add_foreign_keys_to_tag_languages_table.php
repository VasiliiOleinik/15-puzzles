<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTagLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tag_languages', function(Blueprint $table)
		{
			$table->foreign('tag_id', 'FK_tag_languages_tags')->references('id')->on('tags')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tag_languages', function(Blueprint $table)
		{
			$table->dropForeign('FK_tag_languages_tags');
		});
	}

}
