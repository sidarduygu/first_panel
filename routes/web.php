<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/login', [AuthController::class, 'loginView']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('/dashboard/user', UserController::class);
Route::resource('/dashboard/customer', CustomerController::class);
Route::resource('/dashboard/product', ProductController::class);

