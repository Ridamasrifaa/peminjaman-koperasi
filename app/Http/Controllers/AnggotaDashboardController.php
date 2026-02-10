<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\Cicilan;
use Illuminate\Support\Facades\Auth;

class AnggotaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $anggota = Anggota::where('id_users', $user->id)->first();

        $kredit  = 0;
        $bunga   = 0;
        $cicilan = 0;
        $pinjamanBarang = [];

        if ($anggota) {
            $pinjaman = Pinjaman::where('anggota_id', $anggota->id)->first();

            if ($pinjaman) {
                $kredit  = $pinjaman->jumlah_pinjaman;
                $bunga   = $pinjaman->bunga_persen;
                $cicilan = $pinjaman->total_pinjaman / $pinjaman->tenor;

                $pinjamanBarang = [
                    (object)['nama'=>'Hanphone','gambar'=>'hp.png'],
                    (object)['nama'=>'Sepatu','gambar'=>'sepatu.png']
                ];
            }
        }

        return view('anggota.dashboard_anggota', compact(
            'kredit','bunga','cicilan','pinjamanBarang','anggota'
        ));
    }

    public function cicilan()
    {
        $user = Auth::user();
        $anggota = Anggota::where('id_users', $user->id)->first();

        $cicilan = collect();
        $cicilanSelanjutnya = collect();

        if ($anggota) {
            $pinjaman = Pinjaman::where('anggota_id', $anggota->id)->first();

            if ($pinjaman) {
                $cicilan = collect([
                    (object)['jumlah'=>290000,'bulan'=>'Bulan 1'],
                    (object)['jumlah'=>290000,'bulan'=>'Bulan 2'],
                    (object)['jumlah'=>290000,'bulan'=>'Bulan 3'],
                ]);

                $cicilanSelanjutnya = collect([
                    (object)['jumlah'=>290000,'bulan'=>'Bulan 4'],
                    (object)['jumlah'=>290000,'bulan'=>'Bulan 5'],
                ]);
            }
        }

        return view('anggota.cicilan', compact('cicilan','cicilanSelanjutnya'));
    }
}
