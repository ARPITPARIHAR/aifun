<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CustomerController;

Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
Route::post('/profile-update', [CustomerController::class, 'profileUpdate'])->name('profile-update');