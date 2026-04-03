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
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// HOME
Route::get('/', function () { return view('login'); });

// AUTH
Route::get('/login', function () {

    if (Auth::check()) {
        $user = Auth::user();

        if ($user->role === 'admin' || $user->role === 'sekertaris') {
            return redirect('/admin/pencarian');
        }

        if ($user->role === 'anggota') {
            return redirect('/anggota');
        }
    }

    return view('login');

})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


// ANGGOTA (LOGIN)
    Route::middleware(['auth', 'role:anggota'])->group(function () {
    Route::get('/anggota', [AnggotaDashboardController::class, 'index'])->name('anggota.dashboard');
    Route::get('/anggota/cicilan', [AnggotaDashboardController::class, 'cicilan'])->name('anggota.cicilan');
    Route::get('/anggota/profile', [AnggotaDashboardController::class, 'profile'])->name('anggota.profile');
    Route::get('/anggota/edit-profile', [AnggotaDashboardController::class, 'editProfile'])->name('anggota.edit_profile');
    Route::post('/anggota/profile', [AnggotaDashboardController::class, 'updateProfile'])->name('anggota.update_profile');

    Route::get('/anggota/customer-service', [AnggotaDashboardController::class, 'customerService'])
        ->name('anggota.customer_service');

    // PINJAMAN ANGGOTA (FIX DOUBLE ROUTE)
    Route::get('/anggota/pinjaman', [AnggotaDashboardController::class, 'listPinjaman'])
        ->name('anggota.list.pinjaman');

    Route::get('/anggota/cicilan/{id}', [AnggotaDashboardController::class, 'cicilanDetail'])
        ->name('anggota.cicilan.detail');

    Route::get('/anggota/pinjaman/ajukan/{id}', [PinjamanController::class, 'ajukan'])
        ->name('anggota.pinjaman.ajukan');
});


// ADMIN
    Route::middleware(['auth', 'role:admin,sekertaris'])->group(function () {

    Route::get('/admin/pencarian', [AdminDashboardController::class, 'pencarian'])->name('admin.pencarian');

    Route::get('/admin/anggota/create', function () {
        return view('admin.tambah-anggota');
    })->name('anggota.create');

    Route::post('/admin/anggota', [AnggotaController::class, 'store'])->name('anggota.store');

    Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])->name('admin.profile');

    Route::get('/admin/edit-profile', function () {
        return view('admin.edit-profile');
    })->name('profile.edit');

    Route::put('/admin/profile', [AdminDashboardController::class, 'updateProfile'])->name('profile.update');

    Route::get('/admin/ajukan-pinjaman/{id}', function ($id) {
        return view('admin.ajukan-pinjaman', compact('id'));
    })->name('admin.pinjaman.ajukan');

    // PINJAMAN ADMIN (AMAN)
    Route::get('/admin/pinjaman/{id}', [PinjamanController::class, 'detail'])
        ->name('pinjaman.detail');

    Route::get('/admin/anggota/{id}/pinjaman', [PinjamanController::class, 'listPinjaman'])
        ->name('admin.pinjaman.list');

    Route::post('/admin/pinjaman', [PinjamanController::class, 'store'])
        ->name('admin.pinjaman.store');

    Route::post('/angsuran/{id}/bayar', [PinjamanController::class, 'bayar'])
        ->name('angsuran.bayar');

    Route::get('/admin/anggota/{id}/cek-pinjaman', [PinjamanController::class, 'cekPinjamanAnggota'])
        ->name('admin.cek.pinjaman');

    // CRUD anggota
    Route::get('/admin/anggota/{id}/edit', [AnggotaController::class,'edit'])->name('anggota.edit');
    Route::put('/admin/anggota/{id}', [AnggotaController::class,'update'])->name('anggota.update');
    Route::delete('/admin/anggota/{id}', [AnggotaController::class,'destroy'])->name('anggota.destroy');

});


// PINJAMAN (GLOBAL - DIAMANKAN)
Route::get('/pinjaman', [PinjamanController::class, 'index'])
    ->middleware(['auth']);



// CICILAN

Route::get('/cicilan/{id}', [CicilanController::class, 'index'])
    ->middleware(['auth'])
    ->name('cicilan');


// SIMPANAN
Route::get('/simpanan/{id}', [SimpananController::class, 'index'])
    ->middleware(['auth']);

Route::post('/simpanan', [SimpananController::class, 'store'])
    ->middleware(['auth']);


// USERS 
Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::put('/users/{id}', [UserController::class, 'update']);


// RESET PASSWORD
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Illuminate\Http\Request $request) {

    $request->validate([
        'email' => 'required|email'
    ]);

    Password::sendResetLink(
        $request->only('email')
    );

    return back()->with('status', 'Kalau email terdaftar, link reset sudah dikirim.');
});

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', function (Illuminate\Http\Request $request) {

    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        }
    );

    return redirect('/login')->with('status', 'Password berhasil diubah!');
});