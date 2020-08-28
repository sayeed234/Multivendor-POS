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
            $table->bigIncrements('id');
            $table->string('userid');
            $table->string('customerid');
            $table->string('subtotal');
            $table->string('paytotal');
            $table->string('duetotal');
            $table->string('qty');
            $table->string('status');
            $table->string('month');
            $table->string('monthpay');
            $table->string('emi');
            $table->string('paytime');
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
        Schema::dropIfExists('orders');
    }
}
