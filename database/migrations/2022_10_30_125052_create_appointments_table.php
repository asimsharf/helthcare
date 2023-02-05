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
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();

            $table->integer('type')->default(1);        // 1 = video call, 2 = in person
            $table->time('time');    // 1 = 9:00 AM, 2 = 9:30 AM, 3 = 10:00 AM, 
            $table->date('date');    // 1 = 2022-10-30, 2 = 2022-10-31, 3 = 2022-11-01, 
            $table->integer('status')->default(1);      // 1 = pending, 2 = accepted, 3 = rejected, 4 = cancelled
            $table->string('number', 255);  // 1 = 1234567890, 2 = 1234567891, 3 = 1234567892
            $table->string('duration', 255);// 1 = 30 minutes, 2 = 1 hour, 3 = 1 hour 30 minutes, 4 = 2 hours
            $table->string('reason', 255);  // 1 = checkup, 2 = follow up, 3 = emergency
            $table->integer('for_another_patient')->default(0);     // 1 = yes, 0 = no
            $table->integer('cancel')->default(0);      // 1 = yes, 0 = no
            $table->integer('reject')->default(0);      // 1 = yes, 0 = no

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

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
        Schema::dropIfExists('appointments');
    }
};
