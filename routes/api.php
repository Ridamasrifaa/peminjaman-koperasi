<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamanController;


//ROUTE ANGGOTA
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::post('/anggota', [AnggotaController::class, 'store']);
Route::get('/anggota/{id}', [AnggotaController::class, 'show']);
Route::put('/anggota/{id}', [AnggotaController::class, 'update']);
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy']);

// ROUTE PINJAMAN
Route::get('/pinjaman', [PinjamanController::class, 'index']);
Route::post('/pinjaman', [PinjamanController::class, 'store']);
Route::get('/pinjaman/{id}', [PinjamanController::class, 'show']);
Route::put('/pinjaman/{id}', [PinjamanController::class, 'update']);
Route::delete('/pinjaman/{id}', [PinjamanController::class, 'destroy']);
