<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route for the homepage showing all products
Route::get('/', [ProductController::class, 'index'])->name('home');

// Route for a specific product page
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/', function () {
    return view('welcome');
});
