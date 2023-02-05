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
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payment_id')->unsigned();
            $table->string('code', 255);
            $table->integer('is_enabled')->default(0);  // 1 = enabled, 0 = disabled
            $table->float('discount');
            $table->string('discount_description');
 
            $table->string('discount_type', 50)->default('percentage'); // ex: percentage, fixed_amount
            $table->integer('times_usage');
            $table->date('expire_date');

            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
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
        Schema::dropIfExists('coupons');
    }
};
