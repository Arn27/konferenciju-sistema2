<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Middleware\LanguageMiddleware;

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

Route::get('/home', function () {
    return view('home');
})->name('home');

// Authentication routes (login, register, etc.)
Auth::routes();

// Routes for authenticated users with language support
Route::middleware(['auth', LanguageMiddleware::class])->group(function () {

    // Client routes (role: client)
    Route::prefix('client')->middleware('role:client')->group(function () {
        Route::get('/conferences', [ClientController::class, 'index'])->name('client.conferences');
        Route::get('/conferences/{id}', [ClientController::class, 'show'])->name('client.conferences.show');
        Route::get('/conferences/{id}/register', [ClientController::class, 'registerForm'])->name('client.conferences.register');
        Route::post('/conferences/{id}/register', [ClientController::class, 'register'])->name('client.conferences.register.submit');
    });

    // Employee routes (role: employee)
    Route::prefix('employee')->middleware('role:employee')->group(function () {
        Route::get('/conferences', [EmployeeController::class, 'index'])->name('employee.conferences');
        Route::get('/conferences/{id}', [EmployeeController::class, 'show'])->name('employee.conferences.show');
    });

    // Admin routes (role: admin)
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        // User management
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');

        // Conference management
        Route::get('/conferences', [ConferenceController::class, 'index'])->name('admin.conferences.index');
        Route::get('/conferences/create', [ConferenceController::class, 'create'])->name('admin.conferences.create');
        Route::post('/conferences', [ConferenceController::class, 'store'])->name('admin.conferences.store');
        Route::get('/conferences/{id}/edit', [ConferenceController::class, 'edit'])->name('admin.conferences.edit');
        Route::put('/conferences/{id}', [ConferenceController::class, 'update'])->name('admin.conferences.update');
        Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy'])->name('admin.conferences.destroy');
    });
});

