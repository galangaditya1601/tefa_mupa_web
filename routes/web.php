<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');



// backoffice
Route::prefix('backoffice')->group(function () {
    // Tambahkan rute backoffice di sini
});




