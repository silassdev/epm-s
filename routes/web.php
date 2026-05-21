<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TenantController;

Route::get('/', function () {
    return view('welcome');
});




Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('properties', PropertyController::class);
    Route::resource('units', UnitController::class);
    Route::resource('tenants', TenantController::class);
});