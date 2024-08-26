<?php

use App\Http\Controllers\Company\BranchController;
use App\Http\Controllers\Company\CompanyController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::controller(CompanyController::class)->group(function () {
    Route::get('companies/create', 'create')->name('companies.create');
    Route::get('companies/edit/{id}', 'edit')->name('companies.edit');
    Route::post('companies', 'store')->name('companies.store');
    Route::patch('companies/update/{id}', 'update')->name('companies.update');
});

Route::controller(BranchController::class)->group(function () {
    Route::get('branches/create', 'create')->name('branches.create');
    Route::get('branches/edit/{id}', 'edit')->name('branches.edit');
    Route::post('branches', 'store')->name('branches.store');
    Route::patch('branches/update/{id}', 'update')->name('branches.update');
});
