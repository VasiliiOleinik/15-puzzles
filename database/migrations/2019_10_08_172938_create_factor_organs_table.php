<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactorOrgansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factor_organs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('factors_id')->unsigned();
            $table->bigInteger('organs_id')->unsigned();
            $table->bigInteger('is_active')->default(0);
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
        Schema::dropIfExists('factor_organs');
    }
}
