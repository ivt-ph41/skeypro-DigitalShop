<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_products', function (Blueprint $table) {
            $table->bigIncrements('id');        
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->float('amount')->default(1);
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->string('session_token');
            $table->timestamps();
            $table->string('status')->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_products');
    }
}
