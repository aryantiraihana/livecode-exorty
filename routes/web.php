<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', function () {
    return view('home');
});

Route::prefix('/produk')->name('produk.')->group(function() {
    Route::get('/create', [ProdukController::class, 'create'])->name('create');
    Route::post('/store', [ProdukController::class, 'store'])->name('store');
    Route::get('/', [ProdukController::class, 'index'])->name('home');
    Route::get('/{id}', [ProdukController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [ProdukController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('delete');
});

Route::prefix('/transaksi')->name('transaksi.')->group(function() {
    Route::get('/create', [TransaksiController::class, 'create'])->name('create');
    Route::post('/store', [TransaksiController::class, 'store'])->name('store');
    Route::get('/', [TransaksiController::class, 'index'])->name('home');
    // Route::get('/{id}', [TransaksiController::class, 'edit'])->name('edit');
    // Route::patch('/{id}', [TransaksiController::class, 'update'])->name('update');
    // Route::delete('/{id}', [TransaksiController::class, 'destroy'])->name('delete');
});