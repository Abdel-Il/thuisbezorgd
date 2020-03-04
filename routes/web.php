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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('RestaurantController@update');
Route::post('LoginController@update');

Route::get('/add-to-cart/{id}', 'CartController@addToCart')->name('cart');
// Route::get('/shoppingCart', [ 'uses' => 'CartController@getCart', 'as' => 'shoppingCart' ]);
Route::get('/shoppingcart/my', 'CartController@getCart')->name('shoppingcart');

Route::get('/cart/reduce/{id}', 'CartController@reduceByOne')->name('reduceByOne');
Route::get('/cart/remove/{id}', 'CartController@removeItem')->name('removeItem');

Route::get('/checkout', 'CartController@getCheckout')->name('checkin');
Route::get('user/checkout', 'CartController@postCheckout')->name('checkout');

Route::resource('/restaurant', 'RestaurantController');
Route::resource('/food', 'ConsumableController');
Route::resource('/user', 'Auth\LoginController');
Route::resource('/shoppingcart', 'CartController');