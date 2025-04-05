<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/category/name', function () { return view('category');})->name('category');

Route::get('/coming-soon', function () { return view('coming-soon'); })->name('comingSoon');

Route::get('/book-detail', function () { return view('book-detail'); })->name('bookDetail');
