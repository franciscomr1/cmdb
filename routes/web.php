<?php

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

Route::get('/test', function (Request $request) {
    return Jetstream::inertia()->render($request, 'Test', [
        'title' => 'Testing',
        'fieldPropierties' => [
            ['id' => 'name', 'label' => 'name', 'type' => 'text'],
            ['id' => 'business_name', 'label' => 'business_name', 'type' => 'text'],
            ['id' => 'address', 'label' => 'address', 'type' => 'text'],
            ['id' => 'city', 'label' => 'city', 'type' => 'text'],
            ['id' => 'state', 'label' => 'state', 'type' => 'text'],
            ['id' => 'postal_code', 'label' => 'postal_code', 'type' => 'text'],
        ],
        'formFields' => [
            'name' => null,
            'business_name' => null,
            'address' => null,
            'city' => null,
            'state' => null,
            'postal_code' => null
        ]
    ]);
})->name('page.test');
