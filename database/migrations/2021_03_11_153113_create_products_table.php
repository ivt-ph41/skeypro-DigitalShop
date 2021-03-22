<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('imageCover_id')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->string('shortDescription',255)->nullable();
            $table->longText('longDescription')->nullable();
            $table->double('oldPrice')->nullable();
            $table->double('price')->nullable();
            $table->text('noteInOrder')->nullable();
            $table->text('tutorial')->nullable();
            $table->integer('priority')->default(0);
            $table->string('status')->default('active');
            $table->string('typeOfDeliver')->default('auto'); // cách deliver item tự động, thủ công, vận chuyển
            $table->string('buyer_require')->nullable();  // yêu cầu cung cấp thông tin từ buyer
            $table->string('typeOfSale')->default('resell'); // resell = bán lại nhiều lần, retail = bán từng sản phẩm
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
        Schema::dropIfExists('products');
    }
}
