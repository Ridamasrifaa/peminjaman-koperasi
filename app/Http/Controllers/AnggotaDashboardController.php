<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\Cicilan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaDashboardController extends Controller
{
    // ================= DASHBOARD =================
    public function index()
    {
        $user = Auth::user();

        $anggota = Anggota::where('id_users', $user->id)->first();

        $kredit  = 0;
        $bunga   = 0;
        $cicilan = 0;
        $pinjamanBarang = collect();

        if ($anggota) {

            $pinjaman = Pinjaman::where('anggota_id', $anggota->id)->first();

            if ($pinjaman) {

                $kredit  = $pinjaman->jumlah_pinjaman;
                $bunga   = $pinjaman->bunga_persen;

                $cicilan = $pinjaman->tenor > 0
                    ? $pinjaman->total_pinjaman / $pinjaman->tenor
                    : 0;

                $pinjamanBarang = collect([
                    (object)[
                        'nama'   => 'Hanphone',
                        'gambar' => 'hp.png'
                    ],
                    (object)[
                        'nama'   => 'Sepatu',
                        'gambar' => 'sepatu.png'
                    ]
                ]);
            }
        }

        return view('anggota.dashboard_anggota', compact(
            'kredit',
            'bunga',
            'cicilan',
            'pinjamanBarang',
            'anggota'
        ));
    }

    // ================= CICILAN =================
    public function cicilan()
    {
        $user = Auth::user();

        $anggota = Anggota::where('id_users', $user->id)->first();

        $cicilan = collect();
        $cicilanSelanjutnya = collect();

        if ($anggota) {

            $pinjaman = Pinjaman::where('anggota_id', $anggota->id)->first();

            if ($pinjaman) {

                // 🔥 Ambil cicilan yang sudah lunas
                $cicilan = Cicilan::where('pinjaman_id', $pinjaman->id)
                                    ->where('status', 'lunas')
                                    ->get();

                // 🔥 Ambil cicilan yang belum lunas
                $cicilanSelanjutnya = Cicilan::where('pinjaman_id', $pinjaman->id)
                                    ->where('status', 'belum')
                                    ->get();
            }
        }

        return view('anggota.cicilan', compact(
            'cicilan',
            'cicilanSelanjutnya'
        ));
    }

    // ================= UPDATE PROFILE =================
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user->nama = $request->nama;

        if ($request->hasFile('foto')) {

            if ($user->foto) {
                Storage::delete('public/' . $user->foto);
            }

            $path = $request->file('foto')->store('profile', 'public');
            $user->foto = $path;
        }

        $user->save();

        return redirect()->route('anggota.edit_profile')
               ->with('success', 'Profile berhasil diupdate');
    }
}
