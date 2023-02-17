<?php

use Illuminate\Support\Facades\Route;
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



Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('page.users');
Route::get('/dashboard/users-add', [DashboardController::class, 'userAdd'])->name('user.add');
Route::get('/dashboard/users-edit/{id}', [DashboardController::class, 'userEdit'])->name('user.edit');
Route::post('/dashboard/users-add-function', [DashboardController::class, 'userAddFunction'])->name('user.addFunction');
Route::post('/dashboard/users-save-function', [DashboardController::class, 'userSaveFunction'])->name('user.saveFunction');
