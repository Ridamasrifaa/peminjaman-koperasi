<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Anggota;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('admin.editprofile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'nama'   => 'required|string|max:100',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // =========================
        // UPDATE NAMA DI USERS
        // =========================
        $user->nama = $request->nama;

        // =========================
        // UPDATE FOTO
        // =========================
        if ($request->hasFile('avatar')) {

            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }

            // Simpan file ke storage/app/public/profile
            $path = $request->file('avatar')->store('profile', 'public');

            // Simpan path ke database
            $user->foto = $path;
        }

        $user->save();

        // =========================
        // UPDATE NAMA DI TABEL ANGGOTA
        // =========================
        $anggota = Anggota::where('id_users', $user->id)->first();
        if ($anggota) {
            $anggota->nama = $request->nama;
            $anggota->save();
        }

        return redirect('/admin/profile')->with('success', 'Profile berhasil diupdate!');
    }
}