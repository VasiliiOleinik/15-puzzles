<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNameLanguageColsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_language_cols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cols_id');
            $table->string('language');
            $table->string('col1');
            $table->string('col2');
            $table->string('col3');
            $table->string('col4');
            $table->string('col5');
            $table->string('col6');
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
        Schema::dropIfExists('name_language_cols');
    }
}
