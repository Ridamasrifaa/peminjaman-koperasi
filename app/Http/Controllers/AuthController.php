<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        $user = Auth::user(); // ambil data user yang login

        if ($user->role === 'admin' || $user->role === 'sekertaris') {
            return redirect('/admin/dashboard'); // admin & sekretaris ke dashboard admin
        } elseif ($user->role === 'anggota') {
            return redirect('/anggota'); // anggota ke halaman anggota
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah'
    ]);
}

}
