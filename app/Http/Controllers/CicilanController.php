<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Angsuran;
use Carbon\Carbon;

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


    $riwayatTagihan = $pinjaman->angsuran()
        ->where('status','lunas')
        ->orderBy('cicilan_ke')
        ->get();

    return view('admin.cicilan', compact(
        'pinjaman',
        'tagihanSekarang',
        'tagihanSelanjutnya',
        'riwayatTagihan'
    ));
}

public function lunasiSekaligus($pinjamanId)
{
    if (!in_array(auth()->user()->role, ['admin', 'sekertaris'])) {
        abort(403);
    }

    $pinjaman = Pinjaman::findOrFail($pinjamanId);
    $now = Carbon::now();

    // Update semua angsuran yang belum lunas menjadi lunas
    Angsuran::where('pinjaman_id', $pinjamanId)
        ->where('status', 'belum')
        ->update([
            'status' => 'lunas',
            'tanggal_bayar' => $now,
            'bulan' => $now->month,
            'tahun' => $now->year,
        ]);

    // Update status pinjaman menjadi lunas
    $pinjaman->update(['status' => 'lunas']);

    return redirect()->route('cicilan', $pinjamanId)
        ->with('success', 'Semua cicilan berhasil dilunasi!');
}
}
