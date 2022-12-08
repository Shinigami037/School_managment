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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('lname');
            $table->string('sec_email');
            $table->string('student_id');
            $table->string('phone');
            $table->tinyInteger('gender')->comment('0=Female,1=Male');
            $table->string('img');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->integer('zip');
            $table->date('birth_date');
            $table->tinyInteger('is_delete')->default('0');
            $table->tinyInteger('role_as')->default('2')->comment('0=admin,1=teacher,2=student');
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
        Schema::dropIfExists('student');
    }
};
