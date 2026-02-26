<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\Cicilan;

class AnggotaCicilanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $anggota = Anggota::where('id_users', $user->id)->first();

        $cicilan = collect();
        $cicilanSelanjutnya = collect();

        if ($anggota) {

            $pinjaman = Pinjaman::where('anggota_id', $anggota->id)
                                ->where('status', 'approved')
                                ->latest()
                                ->first();

            if ($pinjaman) {

                $cicilan = Cicilan::where('kredit_id', $pinjaman->id)
                                    ->where('status', 'lunas')
                                    ->orderBy('bulan_ke')
                                    ->get();

                $cicilanSelanjutnya = Cicilan::where('kredit_id', $pinjaman->id)
                                    ->where('status', 'tidak lunas')
                                    ->orderBy('bulan_ke')
                                    ->get();
            }
        }

        return view('anggota.cicilan', compact('cicilan','cicilanSelanjutnya'));
    }
}
