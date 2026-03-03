<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Storage; // buat simpan file
use Illuminate\Support\Facades\Auth; // ambil user login

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // untuk route /admin/dashboard
    }

 public function pencarian(Request $request)
{
    $q = $request->q;

    // Ambil anggota + pinjaman langsung (eager loading)
    $anggota = Anggota::with('pinjaman')
        ->when($q, function($query) use ($q) {
            $query->where('nama', 'like', "%$q%");
        })
        ->get();

    return view('admin.pencarian', compact('anggota'));
}

    public function profile()
    {
        return view('admin.profile'); // untuk route /admin/profile
    }

public function updateProfile(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('foto')) {

        if ($user->foto) {
            Storage::delete('public/' . $user->foto);
        }

        $path = $request->file('foto')->store('profile', 'public');
        $user->foto = $path;
    }

    $user->save();

    return redirect('/admin/profile')->with('success', 'Foto berhasil diperbarui!');
}

}
