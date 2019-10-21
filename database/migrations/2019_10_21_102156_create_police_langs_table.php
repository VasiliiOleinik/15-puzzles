<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliceLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_langs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('language')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('h1')->nullable();
            $table->bigInteger('police_id')->unsigned()->index('FK_police_langs');
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('police_langs');
    }
}
