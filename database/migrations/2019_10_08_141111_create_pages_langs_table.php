<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_langs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang');
            $table->string('title');
            $table->bigInteger('pages_id')->unsigned()->index('FK_pages_langs');
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
        Schema::dropIfExists('pages_langs');
    }
}
