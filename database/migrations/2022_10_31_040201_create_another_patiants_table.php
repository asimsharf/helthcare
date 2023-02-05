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
        Schema::create('another_patiants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id')->unsigned();

            $table->string('fname', 255);
            $table->string('lname', 255);
            $table->date('birth_date');
            $table->string('phone', 20)->uniqiue();
            $table->string('relative_relation', 255);
            $table->string('insurance_account', 255);

            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
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
        Schema::dropIfExists('another_patiants');
    }
};
