<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('code'); // mã giảm giá
            $table->string('value'); // giá trị có thể là phần trăm hoặc số tiền cụ thể
            $table->string('type')->default('direct'); // direct: trừ trực tiếp percent: trừ theo phần trăm
            $table->integer('timeOfUses')->nullable(); // số lần sử dụng tối đa cho phép | null bằng unlimited
            $table->datetime('expired_date')->nullable(); // ngày hết hạn | null bằng unlimited
            $table->unsignedBigInteger('creator_id')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}
