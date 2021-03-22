<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_histories',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('addresses',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('balance_histories',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('blog_categories',function (Blueprint $table){
            $table->foreign('cover_id')->references('id')->on('files');
        });
        Schema::table('blog_posts',function (Blueprint $table){
            $table->foreign('blogCategory_id')->references('id')->on('blog_categories');
            $table->foreign('cover_id')->references('id')->on('files');
            $table->foreign('writer_id')->references('id')->on('users');
        });
        Schema::table('blog_comments',function (Blueprint $table){
            $table->foreign('post_id')->references('id')->on('blog_posts');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('cart_products',function (Blueprint $table){
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });
        Schema::table('deliver_details',function (Blueprint $table){
            $table->foreign('deliverCompany_id')->references('id')->on('deliver_companies');
        });
        Schema::table('notifies',function (Blueprint $table){
            $table->foreign('toUser_id')->references('id')->on('users');
        });
        Schema::table('payment_details',function (Blueprint $table){
            $table->foreign('payment_id')->references('id')->on('payment_methods');
        });
        Schema::table('product_payment_methods',function (Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('paymentMethod_id')->references('id')->on('payment_methods');
        });
        Schema::table('product_vouchers',function (Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });
        Schema::table('report_logs',function (Blueprint $table){
            $table->foreign('userReport_id')->references('id')->on('user_reports');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('file_id')->references('id')->on('files');
        });
        Schema::table('role_permissions',function (Blueprint $table){
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('permission_id')->references('id')->on('permissions');
        });
        Schema::table('sliders',function (Blueprint $table){
            $table->foreign('creator_id')->references('id')->on('users');
        });
        Schema::table('user_notifies',function (Blueprint $table){
            $table->foreign('notify_id')->references('id')->on('notifies');
            $table->foreign('user_id')->references('id')->on('users');

        });
        Schema::table('user_rates',function (Blueprint $table){
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('image_id')->references('id')->on('files');
        });
        
        Schema::table('users',function (Blueprint $table){
            $table->foreign('avatar_id')->references('id')->on('files');
            $table->foreign('cover_id')->references('id')->on('files');
        });
        Schema::table('user_roles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('files');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('imageCover_id')->references('id')->on('files');
            $table->foreign('category_id')->references('id')->on('categories');
            
        });
        Schema::table('product_images',function (Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('file_id')->references('id')->on('files');
        });
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('buyer_id')->references('id')->on('users');
        });
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('product_invoices', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });
        Schema::table('user_reports',function (Blueprint $table){
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('buyer_id')->references('id')->on('users');
        });

        Schema::table('vouchers',function (Blueprint $table){
            $table->foreign('creator_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
