<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('y-coordinate');
            $table->string('z-coordinate');
            $table->string('parent-coordinate');
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
        Schema::dropIfExists('organs');
    }
}
