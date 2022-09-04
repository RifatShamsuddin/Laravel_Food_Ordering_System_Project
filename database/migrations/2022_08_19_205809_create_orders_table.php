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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('dishname')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->float('total')->nullable();
            $table->integer('order_status')->default('0');
            $table->string('phone');
            $table->string('address');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('restaurant_id')->references('user_id')->on('users');
            $table->foreign('customer_id')->references('user_id')->on('users');
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
};
