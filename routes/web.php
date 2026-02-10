<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AnggotaDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// ================= ANGGOTA =================
Route::middleware(['auth', 'role:anggota'])
    ->prefix('anggota')
    ->group(function () {

        Route::get('/dashboard', [AnggotaDashboardController::class, 'index'])
            ->name('anggota.dashboard');

        Route::get('/cicilan', function () {
            return view('anggota.cicilan');
        })->name('anggota.cicilan');

        Route::get('/profile', function () {
            return view('anggota.profile');
        })->name('anggota.profile');

        Route::get('/edit-profile', function () {
            return view('anggota.edit_profile');
        })->name('anggota.edit_profile');

        Route::get('/customer-service', function () {
            return view('anggota.customer_service');
        })->name('anggota.customer_service');
    });
