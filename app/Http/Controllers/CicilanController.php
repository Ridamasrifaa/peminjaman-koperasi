<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function cicilan()
{
    $user = Auth::user();
    $anggota = \App\Models\Anggota::where('id_users', $user->id)->first();

    // default supaya Blade aman
    $cicilan = collect(); // bisa pake empty collection
    $cicilanSelanjutnya = collect();

    if ($anggota) {
        $pinjaman = \App\Models\Pinjaman::where('anggota_id', $anggota->id)->first();

        if ($pinjaman) {
            // dummy data buat testing dulu
            $cicilan = collect([
                (object)['jumlah' => 290000],
                (object)['jumlah' => 290000],
                (object)['jumlah' => 290000],
            ]);

            $cicilanSelanjutnya = collect([
                (object)['jumlah' => 290000],
                (object)['jumlah' => 290000],
            ]);
        }
    }

    return view('anggota.cicilan', compact('cicilan', 'cicilanSelanjutnya'));
}

}
