<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('thesis_id');
            $table->string('orderName');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('city');
            $table->string('street');
            $table->string('postal_code');
            $table->string('country_code');
            $table->integer('price');
            $table->integer('gopay_order_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
