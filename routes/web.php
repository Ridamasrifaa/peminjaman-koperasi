<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/anggota', [AnggotaController::class, 'index']);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth', 'role:admin,sekertaris');


Route::get('/test-session', function () {
    session(['cek' => 'jalan']);
    return session('cek');
});



