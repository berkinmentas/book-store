<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CourseContentController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PhoneNumberController;
use App\Http\Controllers\Admin\PreApplicationController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\TeacherController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'loginPageShow'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('auth');
    });
    Route::middleware(['auth:admin'])->group(function() {

        Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');

        Route::resource('/news', NewsController::class);
        Route::post('/news/datatable', [NewsController::class, 'datatable'])->name('news.datatable');

        Route::resource('/contacts', ContactController::class);
        Route::post('/contacts/datatable', [ContactController::class, 'datatable'])->name('contacts.datatable');

        Route::resource('/socialMedias', SocialMediaController::class);
        Route::post('/socialMedias/datatable', [SocialMediaController::class, 'datatable'])->name('social-medias.datatable');

        Route::resource('/phoneNumbers', PhoneNumberController::class);
        Route::post('/phoneNumbers/datatable', [PhoneNumberController::class, 'datatable'])->name('phone-numbers.datatable');
        Route::post('/phoneNumbers/called', [PhoneNumberController::class, 'called'])->name('phone-numbers.called');
        Route::post('/phoneNumbers/removeCalled', [PhoneNumberController::class, 'removeCall'])->name('phone-numbers.removeCalled');

        Route::resource('/books', BookController::class);
        Route::post('/books/datatable', [BookController::class, 'datatable'])->name('books.datatable');

        Route::resource('/teachers', TeacherController::class);
        Route::post('/teachers/datatable', [TeacherController::class, 'datatable'])->name('teachers.datatable');

        Route::resource('/courseContents', CourseContentController::class);
        Route::post('/courseContents/datatable', [CourseContentController::class, 'datatable'])->name('courseContents.datatable');

        Route::resource('/informations', InformationController::class);

        Route::resource('/abouts', AboutController::class);

        Route::resource('/preApplications', PreApplicationController::class);
        Route::post('/preApplications/datatable', [PreApplicationController::class, 'datatable'])->name('preApplications.datatable');
        Route::post('/preApplications/returned', [PreApplicationController::class, 'returned'])->name('preApplications.returned');
        Route::post('/preApplications/removeReturned', [PreApplicationController::class, 'removeReturned'])->name('preApplications.removeReturned');

        Route::resource('/brands', BrandController::class);
        Route::post('/brands/datatable', [BrandController::class, 'datatable'])->name('brands.datatable');

    });
});
