<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CicilanController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\AnggotaDashboardController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/* ================= AUTH ================= */

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

/* ================= ANGGOTA DASHBOARD ================= */

Route::get('/anggota', [AnggotaDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('anggota.dashboard');

Route::get('/anggota/customer-service', function () {
    return view('anggota.customer_service');
    })->name('anggota.customer_service')
    ->middleware('auth');

Route::get('/anggota/cicilan', [AnggotaDashboardController::class, 'cicilan'])
    ->middleware('auth')
    ->name('anggota.cicilan');

Route::get('/anggota/profile', [AnggotaDashboardController::class, 'profile'])
    ->middleware('auth')
    ->name('anggota.profile');

/* ================= ADMIN ================= */

Route::get('/admin/pencarian', [AdminDashboardController::class, 'pencarian'])
    ->name('admin.pencarian')
    ->middleware('auth', 'role:admin,sekertaris');

Route::get('/admin/anggota/create', function () {
    return view('admin.tambah-anggota');
})->name('anggota.create')
  ->middleware('auth', 'role:admin,sekertaris');

Route::post('/admin/anggota', [AnggotaController::class, 'store'])
    ->name('anggota.store')
    ->middleware('auth', 'role:admin,sekertaris');

Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])
    ->middleware('auth', 'role:admin,sekertaris');

Route::get('/admin/edit-profile', function () {
    return view('admin.edit-profile');
})->name('profile.edit')
  ->middleware('auth', 'role:admin,sekertaris');

Route::put('/admin/profile', [AdminDashboardController::class, 'updateProfile'])
    ->name('profile.update')
    ->middleware('auth', 'role:admin,sekertaris');

Route::get('/admin/ajukan-pinjaman', function () {
    return view('admin.ajukan-pinjaman');
})->name('admin.pinjaman.ajukan')
  ->middleware('auth', 'role:admin,sekertaris');

/* ================= PINJAMAN ================= */

Route::get('/pinjaman', [PinjamanController::class, 'index']);
Route::get('/admin/pinjaman/{id}', [PinjamanController::class, 'detail'])
    ->name('pinjaman.detail');

Route::post('/admin/pinjaman', [PinjamanController::class, 'store'])
    ->name('admin.pinjaman.store');

Route::post('/angsuran/{id}/bayar', [PinjamanController::class, 'bayar'])
    ->name('angsuran.bayar');

/* ================= CICILAN ================= */

Route::get('/cicilan/{id}', [CicilanController::class, 'index'])
    ->name('cicilan');

/* ================= SIMPANAN ================= */

Route::get('/simpanan/{id}', [SimpananController::class, 'index']);
Route::post('/simpanan', [SimpananController::class, 'store']);

/* ================= USERS ================= */

Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::put('/users/{id}', [UserController::class, 'update']);