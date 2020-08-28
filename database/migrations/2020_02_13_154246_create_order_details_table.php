<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user');
            $table->string('order_id');
            $table->string('product_id');
            $table->string('productname');
            $table->string('capacity');
            $table->string('color');
            $table->string('qty');
            $table->string('price');
            $table->string('total');
            $table->string('date');
            $table->string('free');
            $table->string('free1');
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
        Schema::dropIfExists('order_details');
    }
}
