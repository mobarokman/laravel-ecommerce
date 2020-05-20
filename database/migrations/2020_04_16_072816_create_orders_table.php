<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('order_number')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('shipping_address_id')->nullable();
            $table->integer('billing_address_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('order_date')->nullable();
            $table->string('shipping_date')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('shipper_id')->nullable();
            $table->string('order_total_cost')->nullable();
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
