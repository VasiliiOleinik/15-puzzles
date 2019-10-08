<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToTablePageLang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_langs', function (Blueprint $table) {
            $table->foreign('pages_id')
                ->references('id')
                ->on('pages');
        });
    }
}
