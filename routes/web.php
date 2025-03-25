<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/coming-soon', function () { return view('coming-soon'); })->name('comingSoon');
