<?php

Route::middleware(['admin'])->group(function () {
    Route::resource('/restaurant/{restaurant_id}/consumable', 'ConsumableController')->middleware('admin');
    Route::resource('/user', 'UserController')->middleware('admin');
    Route::resource('/restaurant', 'RestaurantController')->middleware('admin');
    Route::resource('/order', 'OrderController')->middleware('admin');
    Route::resource('/', 'AdminController')->middleware('admin');

    // Route::post('ProductsController@update');
    Route::post('UserController@update');
});

?>