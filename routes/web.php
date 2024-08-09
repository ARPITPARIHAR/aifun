<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\isCustomer;
use App\Http\Middleware\isDisclaimer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\PracticeAreaController;
use App\Http\Controllers\Frontend\OnlineConsultantController;

Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    dd('Done');
});
// ->middleware([isDisclaimer::class]);
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('contact-us', 'contact_us')->name('contact-us');
    Route::get('about-us/{slug}', 'about_us')->name('about-us');
    Route::get('team', 'team')->name('team');
    Route::get('team/{slug}', 'aboutTeam')->name('about-team');
    Route::get('login-register', 'login_register')->name('login-register');
    Route::get('lawyers', 'lawyers')->name('lawyers');
    Route::get('publications', 'publications')->name('publications');
    Route::get('careers', 'careers')->name('careers');
    Route::get('page/{slug}', 'show')->name('pages.show');
    Route::get('blog', 'blog')->name('blog');
     Route::get('blog/{slug}', 'blogDetail')->name('blog-details');
    Route::get('is-disclaimer', 'disclaimer')->name('is-disclaimer')->withoutMiddleware([isDisclaimer::class]);
    Route::post('is-disclaimer', 'acceptDisclaimer')->name('accept-disclaimer')->withoutMiddleware([isDisclaimer::class]);
});

Route::controller(PracticeAreaController::class)->group(function () {
    Route::get('practice-areas', 'index')->name('practice-areas.index');
    Route::get('practice-area/{slug}', 'show')->name('practice-area.show');
});


Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('admin/login', [LoginController::class, 'customer_login'])->name('user.login');
Route::get('admin/login', [LoginController::class, 'backend_login'])->name('backend.login');

Route::get('/login', [LoginController::class, 'customer_login'])->name('login');
Route::get('/forgot-password', [CustomerController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [CustomerController::class, 'resetPassword'])->name('reset-password');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [LoginController::class, 'register'])->name('register');


Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


Route::get('onlineconsulant', [OnlineConsultantController::class, 'view'])->name('onlineconsulant');
Route::post('/consultation-form', [OnlineConsultantController::class, 'store'])->name('onlineconsulant.store');

Route::get('/search', [SearchController::class, 'search'])->name('search');
