<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;



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


Route::get('/login', [AuthController::class, 'loginView']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('/dashboard/user', UserController::class);


