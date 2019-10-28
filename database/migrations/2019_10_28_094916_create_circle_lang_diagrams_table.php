<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircleLangDiagramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_lang_diagrams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('circle_diagram_name');
            $table->string('language');
            $table->string('name_target');
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
        Schema::dropIfExists('circle_lang_diagrams');
    }
}
