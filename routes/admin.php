<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\MediaController;

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'loginPageShow'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('auth');
    });
    Route::middleware(['auth:web'])->group(function() {

        Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');

        Route::resource('/books', BookController::class);
        Route::post('/books/datatable', [BookController::class, 'datatable'])->name('books.datatable');

        Route::resource('categories', CategoryController::class);
        Route::post('categories-datatable', [CategoryController::class, 'datatable'])->name('categories.datatable');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('users-datatable', [UserController::class, 'datatable'])->name('users.datatable');

    });
});
