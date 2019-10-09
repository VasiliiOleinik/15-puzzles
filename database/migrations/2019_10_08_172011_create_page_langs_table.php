<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_langs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pages_id')->unsigned();
            $table->string('lang');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('puzzles_description')->nullable();
            $table->string('h1')->nullable();
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
        Schema::disableForeignKeyConstraints();
            Schema::dropIfExists('page_langs');
        Schema::enableForeignKeyConstraints();
    }
}
