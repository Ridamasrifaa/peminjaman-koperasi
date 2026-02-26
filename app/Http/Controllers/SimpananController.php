<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpananController extends Controller
{
    public function index($anggota_id)
    {
        // ambil data simpanan
        $simpanan = DB::table('simpanan')
            ->where('anggota_id', $anggota_id)
            ->get();

        // hitung total
        $total = DB::table('simpanan')
            ->where('anggota_id', $anggota_id)
            ->sum('jumlah');

        return view('simpanan.index', compact('simpanan','total','anggota_id'));
    }

    public function store(Request $request)
    {
        DB::table('simpanan')->insert([
            'anggota_id' => $request->anggota_id,
            'jenis_simpanan' => $request->jenis_simpanan,
            'jumlah' => $request->jumlah,
            'tanggal_simpanan' => now()
        ]);

        return back();
    }
}
