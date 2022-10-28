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
        Schema::create('internships', function (Blueprint $table) {
            $table->id()->unique();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->string('job_position');
            $table->string('job_description');
            $table->string('job_requirement');
            $table->unsignedBigInteger('internship_category_id');
            $table->string('job_location');
            $table->string('job_duration');
            $table->string('company_overview');
            
            
            $table->index("user_id");
            $table->foreign('internship_category_id')->references('id')->on('internship_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
};
