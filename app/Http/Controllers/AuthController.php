<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Anggota;

class AuthController extends Controller
{
  public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors([
            'email' => 'Email tidak ditemukan'
        ])->withInput();
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors([
            'password' => 'Password salah'
        ])->withInput();
    }

    // 🔥 CEK APAKAH MASIH PUNYA DATA ANGGOTA
    if ($user->role === 'anggota') {
        $anggota = Anggota::where('id_users', $user->id)->first();

        if (!$anggota) {
            return back()->withErrors([
                'email' => 'Akun sudah tidak terdaftar sebagai anggota'
            ]);
        }
    }

    // login user
    Auth::login($user);
    $request->session()->regenerate();

    if ($user->role === 'admin' || $user->role === 'sekertaris') {
        return redirect('/admin/pencarian');
    } elseif ($user->role === 'anggota') {
        return redirect('/anggota');
    }

    return redirect('/');
}
}