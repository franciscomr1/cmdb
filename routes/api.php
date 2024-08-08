<?php

use App\Http\Controllers\Api\Company\BranchController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Company\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CompanyController::class)->group(function () {
    Route::get('companies', 'index')->name('companies.index');
});

Route::controller(BranchController::class)->group(function () {
    Route::get('branches', 'index')->name('branches.index');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('employees', 'index')->name('employees.index');
});
