<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soft_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userid');
            $table->string('bandid');
            $table->string('productname');
            $table->string('color');
            $table->string('buyprice');
            $table->string('saleprice');
            $table->string('capacity');
            $table->string('size');
            $table->text('image');
            $table->string('status');
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
        Schema::dropIfExists('soft_products');
    }
}
