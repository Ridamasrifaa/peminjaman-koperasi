<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // jika email tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan'
            ])->withInput();
        }

        // jika password salah
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah'
            ])->withInput();
        }

        // login user
        Auth::login($user);
        $request->session()->regenerate();

        // redirect berdasarkan role
        if ($user->role === 'admin' || $user->role === 'sekertaris') {
            return redirect('/admin/pencarian');
        } elseif ($user->role === 'anggota') {
            return redirect('/anggota');
        }

        // fallback jika role tidak dikenali
        return redirect('/');
    }
}