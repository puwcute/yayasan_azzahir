<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProfileController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Public\RegistrationController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('home', function() {
    return redirect()->route('home');
});

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::get('news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('registration', [RegistrationController::class, 'store'])->name('registration.store');

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Admin Routes (with admin auth guard)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('news', [AdminNewsController::class, 'index'])->name('news.index');
        Route::get('news/create', [AdminNewsController::class, 'create'])->name('news.create');
        Route::post('news', [AdminNewsController::class, 'store'])->name('news.store');
        Route::get('news/{news}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
        Route::put('news/{news}', [AdminNewsController::class, 'update'])->name('news.update');
        Route::delete('news/{news}', [AdminNewsController::class, 'destroy'])->name('news.destroy');

        Route::get('registrations', [AdminRegistrationController::class, 'index'])->name('registrations.index');
        Route::get('registrations/{registration}', [AdminRegistrationController::class, 'show'])->name('registrations.show');
        Route::get('registrations/{registration}/approve', [AdminRegistrationController::class, 'approve'])->name('registrations.approve');
        Route::get('registrations/{registration}/reject', [AdminRegistrationController::class, 'reject'])->name('registrations.reject');
        Route::delete('registrations/{registration}', [AdminRegistrationController::class, 'destroy'])->name('registrations.destroy');

        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.read');
        Route::post('messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    });
});
