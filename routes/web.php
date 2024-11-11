<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Middleware\LanguageMiddleware;
use App\Http\Middleware\RoleMiddleware;

// Language switching route
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'lt'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('change_language');

// Public routes
Route::middleware([LanguageMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
});

// Authentication routes (login, register, etc.)
Auth::routes();

// Routes for authenticated users with language support
Route::middleware(['auth', LanguageMiddleware::class])->group(function () {

    // Client routes
    Route::prefix('client')->middleware([RoleMiddleware::class . ':client'])->group(function () {
        Route::get('/conferences', [ClientController::class, 'index'])->name('client.conferences');
        Route::get('/conferences/{id}', [ClientController::class, 'show'])->name('client.conferences.show');
        Route::get('/conferences/{id}/register', [ClientController::class, 'registerForm'])->name('client.conferences.register');
        Route::post('/conferences/{id}/register', [ClientController::class, 'register'])->name('client.conferences.register.submit');
    });

    // Employee routes
    Route::prefix('employee')->middleware([RoleMiddleware::class . ':employee'])->group(function () {
        Route::get('/conferences', [EmployeeController::class, 'index'])->name('employee.conferences');
        Route::get('/conferences/{id}', [EmployeeController::class, 'show'])->name('employee.conferences.show');
    });

    // Admin routes
    Route::prefix('admin')->middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        // User management
        Route::resource('users', UserController::class)->except(['show', 'create', 'store', 'destroy']);

        // Conference management
        Route::resource('conferences', ConferenceController::class)->except(['show']);
    });
});
