<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/* AUTH */
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

/* LOGOUT */
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

/* ANGGOTA */
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::post('/admin/anggota', [AnggotaController::class, 'store'])
    ->name('anggota.store');

/* PINJAMAN */
Route::get('/pinjaman', [PinjamanController::class, 'index']);
Route::get('/admin/pinjaman/{id}', [PinjamanController::class, 'detail'])
    ->name('pinjaman.detail');

/* USERS */
Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::put('/users/{id}', [UserController::class, 'update']);

/* ADMIN */
Route::get('/admin/pencarian', [AdminDashboardController::class, 'pencarian'])
    ->name('admin.pencarian')
    ->middleware('auth', 'role:admin,sekertaris');

Route::get('/admin/anggota/create', function () {
    return view('admin.tambah-anggota');
})->name('anggota.create');

/* PROFILE */
Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])
    ->middleware('auth', 'role:admin,sekertaris');

// halaman edit profile
Route::get('/admin/edit-profile', function () {
    return view('admin.edit-profile');
})->name('profile.edit')
  ->middleware('auth', 'role:admin,sekertaris');

// proses update profile
Route::put('/admin/profile', [AdminDashboardController::class, 'updateProfile'])
    ->name('profile.update')
    ->middleware('auth', 'role:admin,sekertaris');
