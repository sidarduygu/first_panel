<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaturaController;


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



Route::get('/fatura-olustur', [FaturaController::class, 'faturaOlustur']);
Route::post('/fatura-olusturma-methodu', [FaturaController::class, 'faturaOlusturmaMethodu'])->name('fatura.olustur'); 
Route::get('/fatura/{id}', [FaturaController::class, 'goster'])->name('fatura.goster'); 