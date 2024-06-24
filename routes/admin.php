<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\CaseController;
use App\Http\Controllers\Backend\BillingController;
use App\Http\Controllers\Backend\CaseStudyController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\PracticeAreaController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\LawController;
use App\Http\Controllers\Backend\ContactController;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('business-info', 'businessSettings')->name('business-setting');
    Route::post('business-info', 'businessSettingsUpdate')->name('business-setting-update');
    Route::get('profile', 'profile')->name('profile');
    Route::post('profile', 'profileUpdate')->name('profile.update');
});

Route::controller(PageController::class)->group(function () {
    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::controller(SliderController::class)->group(function () {
    Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::controller(PracticeAreaController::class)->group(function () {
    Route::group(['prefix' => 'practice_areas', 'as' => 'practice_areas.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::controller(CustomerController::class)->group(function () {
    Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::controller(ClientController::class)->group(function () {
    Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::controller(CaseController::class)->group(function () {
    Route::group(['prefix' => 'cases', 'as' => 'cases.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::controller(CaseStudyController::class)->group(function () {
    Route::group(['prefix' => 'case-studies', 'as' => 'case-studies.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::controller(LawController::class)->group(function () {
    Route::group(['prefix' => 'laws', 'as' => 'laws.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::controller(BillingController::class)->group(function () {
    Route::group(['prefix' => 'billings', 'as' => 'billings.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::controller(TeamController::class)->group(function () {
    Route::group(['prefix' => 'teams', 'as' => 'teams.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });

    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('contacts/{id}/delete', [ContactController::class, 'delete'])->name('contacts.delete');


});

// Contact Routes
