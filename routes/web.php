<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CicilanController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\AnggotaDashboardController;

// HOME
Route::get('/', function () { return view('welcome'); });

// AUTH
Route::get('/login', function () { return view('login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () { Auth::logout(); return redirect('/login'); })->name('logout');

// ANGGOTA DASHBOARD
Route::middleware('auth')->group(function () {
    Route::get('/anggota', [AnggotaDashboardController::class, 'index'])->name('anggota.dashboard');
    Route::get('/anggota/cicilan', [AnggotaDashboardController::class, 'cicilan'])->name('anggota.cicilan');
    Route::get('/anggota/profile', [AnggotaDashboardController::class, 'profile'])->name('anggota.profile');
    Route::get('/anggota/edit-profile', [AnggotaDashboardController::class, 'editProfile'])->name('anggota.edit_profile');
    Route::post('/anggota/profile', [AnggotaDashboardController::class, 'updateProfile'])->name('anggota.update_profile');
});

// ADMIN DASHBOARD
Route::middleware(['auth', 'role:admin,sekertaris'])->group(function () {
    Route::get('/admin/pencarian', [AdminDashboardController::class, 'pencarian'])->name('admin.pencarian');
    Route::get('/admin/anggota/create', function () { return view('admin.tambah-anggota'); })->name('anggota.create');
    Route::post('/admin/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/edit-profile', function () { return view('admin.edit-profile'); })->name('profile.edit');
    Route::put('/admin/profile', [AdminDashboardController::class, 'updateProfile'])->name('profile.update');
  Route::get('/admin/ajukan-pinjaman/{id}', function ($id) {
  return view('admin.ajukan-pinjaman', compact('id'));
})->name('admin.pinjaman.ajukan');
});

// PINJAMAN
Route::get('/pinjaman', [PinjamanController::class, 'index']);
Route::get('/admin/pinjaman/{id}', [PinjamanController::class, 'detail'])->name('pinjaman.detail');
Route::post('/admin/pinjaman', [PinjamanController::class, 'store'])->name('admin.pinjaman.store');
Route::post('/angsuran/{id}/bayar', [PinjamanController::class, 'bayar'])->name('angsuran.bayar');

// CICILAN
Route::get('/cicilan/{id}', [CicilanController::class, 'index'])->name('cicilan');

// SIMPANAN
Route::get('/simpanan/{id}', [SimpananController::class, 'index']);
Route::post('/simpanan', [SimpananController::class, 'store']);

// USERS
Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::put('/users/{id}', [UserController::class, 'update']);

Route::get('/anggota/customer-service', [AnggotaDashboardController::class, 'customerService'])
    ->name('anggota.customer_service')
    ->middleware('auth');
    Route::get('/anggota/pinjaman', [AnggotaDashboardController::class, 'pinjaman'])
    ->name('anggota.pinjaman');