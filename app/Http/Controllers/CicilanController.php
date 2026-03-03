<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use App\Models\Pinjaman;
class CicilanController extends Controller
{
   
public function index($id)
{
    $pinjaman = Pinjaman::with(['anggota','angsuran'])->findOrFail($id);

    // tagihan sekarang = cicilan pertama yg belum lunas
    $tagihanSekarang = $pinjaman->angsuran()
        ->where('status','tidak lunas')
        ->orderBy('bulan_ke')
        ->first();

    // tagihan selanjutnya (2 setelahnya)
    $tagihanSelanjutnya = $pinjaman->angsuran()
        ->where('status','tidak lunas')
        ->orderBy('bulan_ke')
        ->skip(1)
        ->take(2)
        ->get();

    // riwayat tagihan = yg sudah lunas
    $riwayatTagihan = $pinjaman->angsuran()
        ->where('status','lunas')
        ->orderBy('bulan_ke')
        ->get();

    return view('cicilan', compact(
        'pinjaman',
        'tagihanSekarang',
        'tagihanSelanjutnya',
        'riwayatTagihan'
    ));
}
}
