<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('client')->group(function () {
    Route::get('/conferences', [ClientController::class, 'index'])->name('client.conferences');
    Route::get('/conferences/{id}', [ClientController::class, 'show'])->name('client.conferences.show');
    Route::get('/conferences/{id}/register', [ClientController::class, 'registerForm'])->name('client.conferences.register');
    Route::post('/conferences/{id}/register', [ClientController::class, 'register'])->name('client.conferences.register.submit');
});

Route::prefix('employee')->group(function () {
    Route::get('/conferences', [EmployeeController::class, 'index'])->name('employee.conferences');
    Route::get('/conferences/{id}', [EmployeeController::class, 'show'])->name('employee.conferences.show');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [Admin\AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/users', [Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}/edit', [Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/{id}', [Admin\UserController::class, 'update'])->name('admin.users.update');

    Route::get('/conferences', [Admin\ConferenceController::class, 'index'])->name('admin.conferences.index');
    Route::get('/conferences/create', [Admin\ConferenceController::class, 'create'])->name('admin.conferences.create');
    Route::post('/conferences', [Admin\ConferenceController::class, 'store'])->name('admin.conferences.store');
    Route::get('/conferences/{id}/edit', [Admin\ConferenceController::class, 'edit'])->name('admin.conferences.edit');
    Route::post('/conferences/{id}', [Admin\ConferenceController::class, 'update'])->name('admin.conferences.update');
    Route::post('/conferences/{id}/delete', [Admin\ConferenceController::class, 'destroy'])->name('admin.conferences.destroy');
});
