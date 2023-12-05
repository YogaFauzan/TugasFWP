<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\BarangController;

Route::get('/input_barang', [BarangController::class, 'index']);
Route::post('/proses_barang', [BarangController::class, 'store']);

Route::get('/edit_barang/{id}', [BarangController::class, 'edit'])->name('edit');
Route::post('/proses_barang', [BarangController::class, 'store']);