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
        Schema::create('company_profile', function (Blueprint $table) {
            $table->id()->name('user_id');
            $table->longText('company_overview')->nullable();
            $table->longText('company_whyJoin')->nullable();
            $table->text('company_address')->nullable();
            $table->float('address_lat', 10, 6)->nullable();
            $table->decimal('address_lon', 10, 6)->nullable();
            $table->string('company_photo')->nullable();
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
        Schema::dropIfExists('company_profile');
    }
};
