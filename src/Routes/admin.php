<?php

// Add web middleware for use Laravel feature
use Illuminate\Support\Facades\Route;
use Tir\Authorization\Controllers\AdminRoleController;

Route::group(['middleware' => 'web'], function () {

    //Add admin prefix and middleware for admin area to user module
    Route::group(['prefix' => 'admin', 'middleware' => 'IsAdmin'], function () {
        Route::resource('/role', AdminRoleController::class, ['names' => 'admin.role']);
    });

});

