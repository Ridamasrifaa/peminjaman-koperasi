<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Coba login user
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user(); // ambil data user yang login

            // Redirect berdasarkan role
            if ($user->role === 'admin' || $user->role === 'sekertaris') {
                return redirect('/admin/dashboard'); // admin & sekretaris
            } elseif ($user->role === 'anggota') {
                return redirect()->route('anggota.dashboard'); // anggota
            }
        }

        // Kalau login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }
}
