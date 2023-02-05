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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('city_id')->unsigned()->nullable();

            $table->string('fname');
            $table->string('lname');

            $table->string('username')->unique()->nullable();
            $table->string('iqama')->unique();
            $table->string('phone')->unique();
            $table->string('other_phone')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('confirm_password');
            $table->string('image')->nullable();
    
            $table->string('address')->nullable();
            $table->string('user_type');
            $table->integer('is_active')->default(0);
            $table->string('code')->nullable();
            $table->string('fcm_token')->nullable();

            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
};
