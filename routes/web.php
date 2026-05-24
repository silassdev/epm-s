<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'onboarded'])
    ->name('dashboard');

Route::get('/email/confirmed', function (\Illuminate\Http\Request $request) {
    return view('auth.email-confirmed', [
        'status' => $request->query('status', 'success')
    ]);
})->name('email.confirmed');

Route::middleware(['auth'])->group(function () {
    Route::get('/onboarding', [OnboardingController::class, 'show'])->name('onboarding');
    Route::post('/onboarding', [OnboardingController::class, 'store']);
});

Route::middleware(['auth', 'onboarded'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Landlord Sections
    Route::resource('properties', PropertyController::class);
    Route::resource('units', UnitController::class);
    
    // Tenants & Invitations
    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::get('/tenants/{tenant}', [TenantController::class, 'show'])->name('tenants.show');
    Route::delete('/tenants/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');

    Route::get('/invitations', [TenantController::class, 'invitationsIndex'])->name('tenants.invitations');
    Route::post('/invitations', [TenantController::class, 'storeInvitation'])->name('tenants.invitations.store');
    Route::delete('/invitations/{invitation}', [TenantController::class, 'destroyInvitation'])->name('tenants.invitations.destroy');

    // Invoices & Bills
    Route::resource('invoices', InvoiceController::class);
    
    // Payments
    Route::resource('payments', PaymentController::class);

    // Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings.edit');
    Route::post('/settings', [DashboardController::class, 'settingsUpdate'])->name('settings.update');
});

// Public Guest Route for Redeeming Invitations
Route::get('/invitations/accept/{token}', [TenantController::class, 'acceptInvitation'])->name('tenants.invitations.accept');

require __DIR__.'/auth.php';
