<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userReport_id'); // thuộc về vấn đề nào
            $table->unsignedBigInteger('user_id'); // người hội thoại
            $table->text('content')->nullable(); // nội dung văn bản
            $table->unsignedBigInteger('file_id'); // nội dung file
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
        Schema::dropIfExists('report_logs');
    }
}
