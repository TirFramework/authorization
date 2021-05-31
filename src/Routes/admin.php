<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Add web middleware for use Laravel feature
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {

    //Add admin prefix and middleware for admin area to user module
//    Route::group(['prefix' => 'admin', 'middleware' => 'IsAdmin'], function () {
//        Route::resource('/role', AdminRoleController);
//    });
//
});

