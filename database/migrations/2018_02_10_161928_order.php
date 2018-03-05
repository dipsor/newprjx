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
            $table->integer('user_id')->unsigned();
            $table->integer('thesis_id')->unsigned();
            $table->string('orderName');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('city');
            $table->string('street');
            $table->string('postal_code');
            $table->string('country_code');
            $table->integer('price');
            $table->string('status')->nullable();
            $table->string('gopay_order_id')->nullable();
            $table->timestamps();
        });

//        Schema::table('orders', function($table) {
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('thesis_id')->references('id')->on('users');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
//            $table->dropForeign(['thesis_id']);
        });
    }
}
