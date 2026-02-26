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

            $user = Auth::user();
if ($user->role === 'admin' || $user->role === 'sekertaris') {
    return redirect('/admin/pencarian'); // langsung ke pencarian
} elseif ($user->role === 'anggota') {
    return redirect('/anggota');
}

        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }
}
