<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\Angsuran;
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

            // ambil pinjaman approved terbaru
            $pinjaman = Pinjaman::where('anggota_id', $anggota->id)
                ->where('status', 'approved')
                ->orderBy('id', 'desc')
                ->first();

            if ($pinjaman) {

                $bunga = $pinjaman->bunga_persen;

                /*
                ============================================
                TOTAL SUDAH DIBAYAR
                ============================================
                */
                $totalDibayar = Angsuran::where('pinjaman_id', $pinjaman->id)
                    ->where('status', 'lunas')
                    ->sum('total_bayar');

                /*
                ============================================
                SISA KREDIT
                ============================================
                */
                $kredit = $pinjaman->total_pinjaman - $totalDibayar;

                /*
                ============================================
                CICILAN PER BULAN
                ============================================
                */
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
        $tagihanSekarang = null;
        $riwayatTagihan = collect();

        if ($anggota) {

            $pinjaman = Pinjaman::where('anggota_id', $anggota->id)
                ->where('status', 'approved')
                ->orderBy('id','desc')
                ->first();

            if ($pinjaman) {

                $cicilan = Angsuran::where('pinjaman_id', $pinjaman->id)
                    ->where('status', 'lunas')
                    ->get();

                $cicilanSelanjutnya = Angsuran::where('pinjaman_id', $pinjaman->id)
                    ->where('status', 'belum')
                    ->get();

                $tagihanSekarang = $cicilanSelanjutnya->first();

                $riwayatTagihan = Angsuran::where('pinjaman_id', $pinjaman->id)
                    ->orderBy('cicilan_ke', 'asc')
                    ->get();
            }
        }

        return view('anggota.cicilan', [
            'cicilan' => $cicilan,
            'tagihanSelanjutnya' => $cicilanSelanjutnya,
            'tagihanSekarang' => $tagihanSekarang,
            'riwayatTagihan' => $riwayatTagihan
        ]);
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


    public function profile()
    {
        $user = auth()->user();
        return view('anggota.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('anggota.edit_profile', compact('user'));
    }

    public function customerService()
    {
        return view('anggota.customer_service');
    }

    public function pinjaman()
    {
        $user = auth()->user();

        $anggota = Anggota::where('id_users', $user->id)->first();

        if (!$anggota) {
            return back()->with('error', 'Data anggota tidak ditemukan');
        }

        $pinjaman = Pinjaman::with('angsuran')
            ->where('anggota_id', $anggota->id)
            ->orderBy('tanggal_pinjaman', 'desc')
            ->get();

        return view('anggota.cicilan', compact('pinjaman'));
    }

    public function listPinjaman()
{
    $user = auth()->user();

    $anggota = \App\Models\Anggota::where('id_users', $user->id)->first();

    if (!$anggota) {
        return back()->with('error','Data anggota tidak ditemukan');
    }

    $pinjamanList = \App\Models\Pinjaman::with('angsuran')
        ->where('anggota_id', $anggota->id)
        ->orderBy('created_at','desc')
        ->get();

    return view('anggota.list_pinjaman', compact('pinjamanList'));
}

public function cicilanDetail($id)
{
    $pinjaman = \App\Models\Pinjaman::with('angsuran')->findOrFail($id);

    $tagihanSekarang = $pinjaman->angsuran()
        ->where('status','belum')
        ->orderBy('cicilan_ke')
        ->first();

    $tagihanSelanjutnya = $pinjaman->angsuran()
        ->where('status','belum')
        ->orderBy('cicilan_ke')
        ->skip(1)
        ->take(2)
        ->get();

    $riwayatTagihan = $pinjaman->angsuran()
        ->where('status','lunas')
        ->orderBy('cicilan_ke')
        ->get();

    return view('anggota.cicilan', compact(
        'pinjaman',
        'tagihanSekarang',
        'tagihanSelanjutnya',
        'riwayatTagihan'
    ));
}
}