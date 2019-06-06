<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/get_captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    return $captcha->src($config);
});

Route::get('/', 'HomeController@index');
Route::get('/contact', 'HomeController@contactPage');
Route::post('/signupForm', 'HomeController@signupForm');
Route::post('/loginForm', 'HomeController@loginForm');
Route::get('/logout', 'HomeController@logout');
Route::post('/contactForm', 'HomeController@contactForm')->name('contactForm');
Route::post('/addCart', 'HomeController@addCart');


Route::get('/projects', 'ProjectController@index');
Route::get('/projects/{slug}', 'ProjectController@show')->name('project.show');

Route::get('/services', 'ServiceController@index');
Route::get('/services/{slug}', 'ServiceController@show')->name('service.show');
Route::post('/order_service', 'ServiceController@order')->name('order');


Route::get('/products', 'ProductController@index');
Route::get('/products/{slug}', 'ProductController@show')->name('product.show');
Route::get('/categories/{slug}', 'ProductController@categoryPage')->name('category.show');
Route::post('/addProductInCart', 'ProductController@addProductInCart')->name('addCart');
Route::post('/deleteProductInCart', 'ProductController@deleteProductInCart');
Route::get('/cart', 'ProductController@showCart');

Route::get('/viewCart', 'CartController@index');
Route::post('/order', 'CartController@order')->name('cartOrder');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', 'HomeController@dashboard');
    Route::resource('/companies', 'CompanyController');
    Route::resource('/services', 'ServiceController');
    Route::resource('/projects', 'ProjectController');
    Route::resource('/products', 'ProductController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/users', 'UserController');
    Route::resource('/messages', 'MessageController');
    Route::get('/product-orders', 'OrderController@productOrders')->name('product-orders.index');
    Route::get('/service-orders', 'OrderController@serviceOrders')->name('service-orders.index');

    Route::get('/product-order-edit/{id}', 'OrderController@editOrderProduct')->name('product-order-edit');
    Route::get('/service-order-edit/{id}', 'OrderController@editOrderService')->name('service-order-edit');

    Route::post('/product-order-update/{id}', 'OrderController@updateOrderProduct')->name('product-order-update');
    Route::post('/service-order-update/{id}', 'OrderController@updateOrderService')->name('service-order-update');

    Route::delete('/service-orders/{id}/destroy', 'OrderController@destroyServiceOrder')->name('service-order.destroy');
    Route::delete('/product-orders/{id}/destroy', 'OrderController@destroyProductOrder')->name('product-order.destroy');

});