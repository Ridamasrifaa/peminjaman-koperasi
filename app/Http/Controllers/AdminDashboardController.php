<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // pastiin role
        if ($user->role !== 'anggota') {
            abort(403);
        }

        // ambil pinjaman milik anggota
        $pinjaman = Pinjaman::where('anggota_id', $user->id)->first();

        // kalo belum punya pinjaman
        if (!$pinjaman) {
            return view('dashboardanggota', [
                'kredit'   => 0,
                'bunga'    => 0,
                'cicilan'  => 0,
            ]);
        }

        $kredit  = $pinjaman->jumlah_pinjaman;
        $bunga   = $pinjaman->bunga_persen;
        $cicilan = $pinjaman->total_pinjaman / $pinjaman->tenor;

        return view('dashboardanggota', compact(
            'kredit',
            'bunga',
            'cicilan'
        ));
    }
}
