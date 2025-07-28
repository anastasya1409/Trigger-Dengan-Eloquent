<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokinController;
use App\Http\Controllers\StokoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produk', ProdukController::class)->except(['destroy']);
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

Route::resource('stokins', StokinController::class)->except(['destroy']);
Route::delete('/stokins/{stokin}', [StokinController::class, 'destroy'])->name('stokins.destroy');

Route::resource('stokouts', StokoutController::class)->except(['destroy']);
Route::delete('/stokouts/{stokout}', [StokoutController::class, 'destroy'])->name('stokouts.destroy');
