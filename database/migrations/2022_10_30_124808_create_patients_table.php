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
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->uniqid();
            $table->string('patient_number')->unique()->nullable();
            $table->string('marital_status', 20)->nullable();
            $table->double('height', 8, 2)->nullable();
            $table->double('weight', 8, 2)->nullable();
            $table->string('family_member_phone', 20)->nullable();
            $table->integer('psychiatrist')->default(0)->nullable();
            $table->string('psychiatrist_description')->nullable();
            $table->integer('disability')->default(0)->nullable();
            $table->string('disability_description')->nullable();
            $table->integer('health_problem')->default(0)->nullable();
            $table->string('health_problem_description')->nullable();
            $table->integer('medication')->default(0)->nullable();
            $table->string('medication_description')->nullable();
            $table->string('habits')->default('[]')->nullable();
            $table->string('habits_other_details')->nullable();
            $table->integer('diseases')->default(0)->nullable();
            $table->string('diseases_other_details')->nullable();

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
        Schema::dropIfExists('patients');
    }
};
