<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/anggota', [AnggotaController::class, 'index']);

// TEST SESSION
Route::get('/test-session', function () {
    session(['cek' => 'jalan']);
    return session('cek');
});
