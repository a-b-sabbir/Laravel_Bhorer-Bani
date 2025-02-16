<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\RoleController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\AdvertisementController;
use App\Http\Controllers\Frontend\UserAddressController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/advertisements', AdvertisementController::class);
Route::resource('categories', CategoryController::class);
Route::resource('/news', NewsController::class);
Route::resource('roles', RoleController::class);
Route::resource('/users-address', UserAddressController::class); 
Route::resource('/users', UserController::class);





