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
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->uniqid();
            $table->integer('department_id')->unsigned();
            $table->integer('experience_years');
            $table->string('place_of_study', 255);
            $table->string('image', 255);
            $table->string('certificates', 255);
            $table->string('social_media', 255);
            $table->string('about_the_doctor', 255);
            $table->float('rating_percentage');
            $table->float('consultation_price', 255);
            $table->string('skills', 255);
            $table->bigInteger('iqama');
            $table->string('work_experience', 255);
            $table->string('authority_card', 255);
            $table->string('health_affairs_licensing', 255);
            $table->integer('is_verified');
            $table->integer('is_receiving_appointments');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('doctors');
    }
};
