<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
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
            $table->unsignedBigInteger('buyer_id');
            $table->string('creator')->nullable();
            $table->string('admin_note')->nullable();
            $table->string('buyer_note')->nullable();
            $table->double('discount')->nullable();
            $table->double('total');
            $table->datetime('paidDate')->nullable();
            $table->datetime('expiredDate')->nullable();
            $table->string('status')->default('unpaid');
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
        Schema::dropIfExists('invoices');
    }
}
