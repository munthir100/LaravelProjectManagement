<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\HomeController;
use App\Http\Controllers\Account\AccountTaskController;
use App\Http\Controllers\Account\AccountProjectController;
use App\Http\Controllers\Account\AccountSecurityController;
use App\Http\Controllers\Account\AccountSettingsController;
use App\Http\Controllers\Account\Auth\AccountLoginController;
use App\Http\Controllers\Account\Auth\ForgotPasswordController;
use App\Http\Controllers\Account\Auth\AccountRegisterController;
use App\Http\Controllers\HomeController as ControllersHomeController;

Route::middleware('setLocale')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('changeLocale', [ControllersHomeController::class, 'changeLocale'])->name('changeLocale');
    // Authentication Routes
    Route::name('account.')->group(function () {
        Route::middleware('guest:account')->group(function () {
            Route::get('/login', [AccountLoginController::class, 'showLoginForm'])->name('login');
            Route::post('/login', [AccountLoginController::class, 'login'])->name('login.submit');
            // Registration Routes
            Route::get('/register', [AccountRegisterController::class, 'showRegistrationForm'])->name('register');
            Route::post('/register', [AccountRegisterController::class, 'register'])->name('register.submit');

            // Forgot Password Routes
            Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('password.request');
            Route::post('/forgot-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.email');

            // Reset Password Routes
            Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
            Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
        });

        Route::middleware('auth:account')->prefix('account')->group(function () {
            Route::get('/home', [HomeController::class, 'home'])->name('home');
            Route::post('/logout', [AccountLoginController::class, 'logout'])->name('logout');
            // Account Profile Routes
            Route::get('/settings', [AccountSettingsController::class, 'showSettings'])->name('settings');
            Route::get('/security', [AccountSecurityController::class, 'showSecurity'])->name('security');
            Route::put('/settings/update', [AccountSettingsController::class, 'updateSettings'])->name('settings.update');
            Route::put('/security/update', [AccountSecurityController::class, 'updateSecurity'])->name('security.update');

            // Account Project Routes
            Route::resource('/projects', AccountProjectController::class);
            Route::post('/projects/create-cart', [AccountProjectController::class, 'createProjectCart'])->name('projects.create.cart');

            // Account Task Routes
            Route::resource('/tasks', AccountTaskController::class)->except('create');
            Route::get('/tasks/project/{project}', [AccountProjectController::class, 'showTasks'])->name('tasks.project');
        });
    });
});
