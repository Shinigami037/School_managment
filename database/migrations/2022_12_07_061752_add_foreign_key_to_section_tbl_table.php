<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('section_tbl', function (Blueprint $table) {
            $table->unsignedBigInteger('cid');
            $table->foreign('cid')->references('id')->on('class_tbl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('section_tbl', function (Blueprint $table) {
            //
        });
    }
};
