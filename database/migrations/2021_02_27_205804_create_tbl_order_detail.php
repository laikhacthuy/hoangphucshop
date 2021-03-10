<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_detail', function (Blueprint $table) {
            $table->bigIncrements('order_detail_id');
            $table->Integer('order_id');
            $table->Integer('product_id');
            $table->text('product_name');
            $table->Integer('product_price');
            $table->integer('product_qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_order_detail');
    }
}
