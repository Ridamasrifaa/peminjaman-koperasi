<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use App\Models\Pinjaman;
class CicilanController extends Controller
{
   

public function index($id)
{
    $pinjaman = Pinjaman::with(['anggota','angsuran'])->findOrFail($id);

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

    // TAMBAH INI
    $riwayatTagihan = $pinjaman->angsuran()
        ->where('status','lunas')
        ->orderBy('cicilan_ke')
        ->get();

    return view('cicilan', compact(
        'pinjaman',
        'tagihanSekarang',
        'tagihanSelanjutnya',
        'riwayatTagihan'
    ));
}



}
