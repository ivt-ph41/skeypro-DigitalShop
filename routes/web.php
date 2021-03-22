<?php
// Auth route 
    Auth::routes();
// End - Auth route

// Route resources admin portal
    Route::resources([
        'users' => UserController::class,
        'products' => ProductController::class,
    ]);
//End Route resource admin portal

// Route không bắt buộc đăng nhập - all user
    Route::get('/', function () {
        return redirect('trang-chu');
    });
    Route::get('trang-chu', 'HomeController@index')->name('trang-chu');
    Route::get('san-pham/{id}', 'HomeController@product_detail')->name('product_detail');
    Route::post('san-pham/{id}/order', 'MemberController@product_order')->name('product_order');
// End - Route không bắt buộc đăng nhập

// Route Group bắt buộc đăng nhập
    Route::group(['middleware' => 'auth'], function () {
    Route::get('quan-li-don-hang', 'MemberController@ui_orders')->name('ui_orders');
    Route::get('quan-li-don-hang/{order_id}', 'MemberController@ui_order_detail')->name('ui_order_detail');
});
// End - Route Group bắt buộc đăng nhập

// Route password reset
    Route::get('mat-khau/khoi-phuc', 'Auth\ForgotPasswordController@getInfo')->name('password.getInfo');
    Route::post('mat-khau/khoi-phuc', 'Auth\ForgotPasswordController@postInfo')->name('password.postInfo');
    Route::get('mat-khau/khoi-phuc/{token}', 'Auth\ResetPasswordController@getInfo')->name('password.reset.getInfo');
    Route::post('mat-khau/khoi-phuc/{token}', 'Auth\ResetPasswordController@postInfo')->name('password.reset.postInfo');
// End Route password reset

// Start - khoá password reset mặc định
    Route::get('password/reset', function () {
        abort(404);
    });
// End - khoá password reset mặc định