<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
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

        $pinjaman = Pinjaman::with('anggota')
            ->when($q, function ($query) use ($q) {
                $query->whereHas('anggota', function ($sub) use ($q) {
                    $sub->where('nama', 'like', "%$q%");
                });
            })
            ->get();

        return view('admin.pencarian', compact('pinjaman'));
    }

    public function profile()
    {
        return view('admin.profile'); // untuk route /admin/profile
    }

public function updateProfile(Request $request)
{
    $user = auth()->user();

    // validasi file avatar
    $request->validate([
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $filename = time() . '_' . $file->getClientOriginalName();

        // simpan file di storage/app/public/avatars
        $file->storeAs('avatars', $filename, 'public');

        // simpan path di DB
        $user->avatar = 'avatars/' . $filename;
    }

    $user->save();

    return redirect('/admin/profile')->with('success', 'Foto berhasil diperbarui!');
}

}
