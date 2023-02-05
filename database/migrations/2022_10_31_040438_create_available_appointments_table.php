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
        Schema::create('available_appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned(); 
            $table->time('from_time'); // 1 = 9:00 AM, 2 = 9:30 AM, 3 = 10:00 AM,
            $table->time('to_time'); // 1 = 9:00 AM, 2 = 9:30 AM, 3 = 10:00 AM,
            $table->date('date'); // 1 = 2022-10-30, 2 = 2022-10-31, 3 = 2022-11-01,
            $table->integer('is_reserved'); // 1 = reserved, 0 = not reserved

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
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
        Schema::dropIfExists('available_appointments');
    }
};
