<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\RouteController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;

use Illuminate\Support\Facades\Route;


// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// Client Routes
Route::name('client.')
    ->group(function () {
        Route::get('/', [RouteController::class, 'home'])->name('home');

        Route::get('/contact', function () {
            return redirect()->route('client.home');
        })->name('contact');

        Route::middleware(['auth', ClientMiddleware::class])
            ->group(function () {
                Route::get('/dashboard/profile', [ClientController::class, 'dashboard'])
                    ->name('dashboard.profile');

                Route::get('/dashboard/applications', [ClientController::class, 'dashboard'])
                    ->name('dashboard.applications');
            });
    });


// Admin Dashboard Routes
Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        Route::resource('applications', ApplicationController::class);
        Route::resource('fields', FieldController::class);
        Route::resource('clients', UserController::class);
        Route::resource('countries', CountryController::class);
        Route::resource('payments', PaymentController::class);

        Route::get('/import', [AdminController::class, 'importApplications'])
            ->name('import');
        Route::post('/import', [AdminController::class, 'importApplicationsFromCSV'])
            ->name('import.submit');
    });