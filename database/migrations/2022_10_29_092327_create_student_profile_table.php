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
        Schema::create('student_profile', function (Blueprint $table) {
            $table->id()->name('user_id');
            $table->integer('student_id')->nullable()->unique();
            $table->string('student_education')->nullable();
            $table->string('student_photo')->nullable();
            $table->string('student_resume')->nullable();
            $table->string('student_aboutMe')->nullable();
            $table->string('student_status')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('student_profile');
    }
};
