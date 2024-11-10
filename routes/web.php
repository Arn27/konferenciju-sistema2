<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Middleware\LanguageMiddleware;

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'lt'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('change_language');

Route::middleware([LanguageMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

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
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');

        Route::get('/conferences', [ConferenceController::class, 'index'])->name('admin.conferences.index');
        Route::get('/conferences/create', [ConferenceController::class, 'create'])->name('admin.conferences.create');
        Route::post('/conferences', [ConferenceController::class, 'store'])->name('admin.conferences.store');
        Route::get('/conferences/{id}/edit', [ConferenceController::class, 'edit'])->name('admin.conferences.edit');
        Route::put('/conferences/{id}', [ConferenceController::class, 'update'])->name('admin.conferences.update');
        Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy'])->name('admin.conferences.destroy');
    });
});

Auth::routes();