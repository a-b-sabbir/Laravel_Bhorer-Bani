<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('register', [AuthController::class, 'register_post']); // Optional: User registration route

Route::post('login', [AuthController::class, 'login_post'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
