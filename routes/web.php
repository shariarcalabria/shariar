<?php

use App\Http\Controllers\ProdukController;

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
{
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/produk', [ProdukController::class, 'index']);
    
    Route::get('/produk/create', [ProdukController::class, 'create']);
    
    Route::post('/produk/create/{produk?}', [ProdukController::class, 'store']);
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
}