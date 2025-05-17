<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category');

Route::get('/coming-soon', function () { return view('coming-soon'); })->name('comingSoon');

Route::get('/book-detail/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name('bookDetail');

Route::get('/test', function () { return view('test'); })->name('test');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login-page', [LoginController::class, 'loginPageShow'])->name('login-page');
    Route::get('/register-page', [LoginController::class, 'registerPageShow'])->name('register-page');
    Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('throttle:3,5');
    Route::post('/register', [LoginController::class, 'register'])->name('register')->middleware('throttle:3,5');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/sepetim', [CartController::class, 'index'])->name('cart.index');
    Route::post('/sepet/ekle/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/sepet/kaldir/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/sepet/temizle', [CartController::class, 'clear'])->name('cart.clear');
});
include 'admin.php';
