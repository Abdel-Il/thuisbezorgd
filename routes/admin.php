<?php

Route::middleware(['admin'])->group(function () {
    // Route::resource('/admin/consumable', 'admin\ProductsController')->middleware('admin');
    Route::resource('/user', 'UserController')->middleware('admin');
    // Route::resource('/admin/restaurant', 'admin\RestaurantController')->middleware('admin');
    // Route::resource('/admin/order', 'admin\OrderController')->middleware('admin');
    Route::resource('/', 'AdminController')->middleware('admin');

    Route::post('ProductsController@update');
    Route::post('CategoriesController@update');
    Route::post('UserController@update');
});

?>