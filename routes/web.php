<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// --- PUBLIC-FACING ROUTES ---

// Homepage: Displays all products, grouped by category.
Route::get('/', [ProductController::class, 'index'])->name('home');

// Single Product Page: Shows details for a specific product.
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

// Quotation Form Submission: Handles the form post request.
Route::post('/request-quotation', [QuotationController::class, 'store'])->name('quotation.store');


// --- USER AUTHENTICATION ROUTES (from Breeze) ---

// Dashboard: The page users see after logging in.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Management: Routes for editing and deleting a user's profile.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// This file contains all the other necessary auth routes (login, register, etc.)
require __DIR__.'/auth.php';