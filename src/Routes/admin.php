<?php
use Illuminate\Support\Facades\Route;
use Tir\Authorization\Controllers\AdminRoleController;

// Add api middleware for use Laravel feature
Route::group(['middleware' => config('crud.middlewares'), 'prefix' => 'api/v1/admin'], function () {

        Route::resource('/role', AdminRoleController::class, ['names' => 'admin.role']);

});


