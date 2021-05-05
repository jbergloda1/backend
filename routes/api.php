<?php
use App\Models\HomeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api', 'middleware' => ['cors']], function () {

    /*
    |--------------------------------------------------------------------------
    | Open Routes
    |--------------------------------------------------------------------------
    */

     //Cart
     Route::post('add-cart', 'CartController@add')->name('cart.add');
     Route::get('update-cart/{id}', 'CartController@update')->name('cart.update');
     Route::get('remove/{id}', 'CartController@remove')->name('cart.remove');
     Route::get('clear', 'CartController@clear')->name('cart.clear');
     Route::get('view-cart', 'CartController@view')->name('cart.view');

     //bill người dùng
     
     Route::post('bill', 'BillController@store')->name('bill.store');
     Route::get('bill/{id}', 'BillController@show')->name('bill.show');
     
     //WEB PAGE
     // Sản phẩm theo nhà cung cấp
     Route::get('product-supplier/{id}', 'HomeController@getProductSupplier')->name('product.supplier');
     Route::get('product-category/{id}', 'HomeController@getProductCategory')->name('product.category');
     //Color, Size theo Product
     Route::get('product-color/{id}', 'HomeController@getProductColor')->name('product.color');
     Route::get('product-size/{product}/{color}', 'HomeController@getSize')->name('product.size');

     //Token
     Route::post('refresh', 'LoginController@refreshToken')->name('refreshToken');
     Route::delete('delete-token', 'LoginController@deleteToken')->name('deleteToken');

    //login
    Route::post('login', 'LoginController@login')->name('login');

    /*
    |--------------------------------------------------------------------------
    | Protected Routes, Authorization Required
    |--------------------------------------------------------------------------
    */

    // Route::group(['middleware' => ['auth']], function () {
    //     Route::group(['middleware' => ['role']], function () {
            //Users
            Route::get('user', 'UserController@search')->name('user.search');
            Route::post('user', 'UserController@store')->name('user.store');
            Route::get('user/{id}', 'UserController@show')->name('user.show');
            Route::put('user/{id}', 'UserController@update')->name('user.update');
            Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
            //Category
            //Route::get('category', 'CategoryController@search')->name('category.search');
            Route::post('category', 'CategoryController@store')->name('category.store');
            Route::get('category/{id}', 'CategoryController@show')->name('category.show');
            Route::put('category/{id}', 'CategoryController@update')->name('category.update');

            //Supplier
            //Route::get('supplier', 'SupplierController@search')->name('supplier.search');
            Route::post('supplier', 'SupplierController@store')->name('supplier.store');
            Route::get('supplier/{id}', 'SupplierController@show')->name('supplier.show');
            Route::put('supplier/{id}', 'SupplierController@update')->name('supplier.update');

            //Product
            //Route::get('product', 'ProductController@search')->name('product.search');
            Route::post('product', 'ProductController@store')->name('product.store');
            Route::get('product/{id}', 'ProductController@show')->name('product.show');
            Route::put('product/{id}', 'ProductController@update')->name('product.update');
            Route::delete('product/{id}', 'ProductController@destroy')->name('product.destroy');
            //Size Color
            Route::get('size', 'Homecontroller@getsize')->name('size.show');
            Route::get('color', 'Homecontroller@getcolor')->name('color.show');

            Route::get('category', 'CategoryController@search')->name('category.search');
        // });
        
        //User
        Route::get('userprofile/{id}', 'UserController@showProfile')->name('user.showProfile');
        Route::put('userprofile/{id}', 'UserController@updateProfile')->name('user.updateProfile');

        Route::get('supplier', 'SupplierController@search')->name('supplier.search');
        Route::get('product', 'ProductController@search')->name('product.search');

        //Customer
        Route::get('customer', 'CustomerController@search')->name('customer.search');
        Route::get('customer/{id}', 'CustomerController@show')->name('customer.show');
        Route::delete('customer/{id}', 'CustomerController@destroy')->name('customer.destroy');

        //Bill
        Route::get('bill', 'BillController@search')->name('bill.search');
        Route::put('bill/{id}', 'BillController@update')->name('bill.update');
        Route::delete('bill/{id}', 'BillController@destroy')->name('bill.destroy');
        Route::get('statistical', 'BillController@statistical')->name('bill.statistical');
        Route::get('billDetail/{id}', 'BillController@showBillDetail')->name('billDetail.show');
        //Mail
        // Route::get('sendMail', 'MailController@sendEmail')->name('sendEmail');
    // });
});