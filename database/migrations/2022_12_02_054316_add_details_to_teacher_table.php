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
        Schema::table('teacher', function (Blueprint $table) {
            $table->tinyInteger('status')->default('1')->comment('0=inActive,1=Active');
            $table->tinyInteger('is_delete')->default('0');
            $table->tinyInteger('role_as')->default('1')->comment('0=admin,1=teacher,2=student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('is_delete');
            $table->dropColumn('role_as');
        });
    }
};
