<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Pinjaman;
use App\Models\Angsuran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PinjamanController extends Controller
{
    public function index()
    {
        return Pinjaman::with('anggota')->get();
    }

    public function show($id)
    {
        return Pinjaman::with('anggota')->findOrFail($id);
    }
public function detail($id)
{
    $pinjaman = Pinjaman::with('anggota')->findOrFail($id);

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

    // 🔥 RIWAYAT KHUSUS YANG LUNAS
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

public function bayar($id)
{
    $angsuran = Angsuran::findOrFail($id);
        $angsuran->update([
        'status' => 'lunas',
        'tanggal_bayar' => now()
    ]);

    if (!$angsuran) {
        return back()->with('error', 'Data angsuran tidak ditemukan');
    }

    DB::table('angsuran')
        ->where('id', $id)
        ->update([
            'status' => 'lunas',
            'tanggal_bayar' => now()
        ]);

    return back()->with('success', 'Angsuran berhasil dibayar');
}
    public function store(Request $request)
    {
        $request->validate([
            'anggota_id'        => 'required|integer',
            'jumlah_pinjaman'  => 'required|numeric',
            'tenor'            => 'required|integer',
            'tanggal_pinjaman' => 'required|date',
        ]);

        $bunga = 2;

        $total = $request->jumlah_pinjaman +
                 ($request->jumlah_pinjaman * $bunga / 100);

        $pinjaman = Pinjaman::create([
            'anggota_id'        => $request->anggota_id,
            'approved_by'      => null,
            'jumlah_pinjaman'  => $request->jumlah_pinjaman,
            'bunga_persen'     => $bunga,
            'tenor'            => $request->tenor,
            'status'           => 'pending',
            'tanggal_pinjaman' => $request->tanggal_pinjaman,
            'total_pinjaman'   => $total,
        ]);

        $pokok = $pinjaman->jumlah_pinjaman / $pinjaman->tenor;
        $bungaPerBulan = ($pinjaman->jumlah_pinjaman * $pinjaman->bunga_persen / 100) / $pinjaman->tenor;

        for ($i = 1; $i <= $pinjaman->tenor; $i++) {
            Angsuran::create([
                'pinjaman_id' => $pinjaman->id,
                'cicilan_ke' => $i,
                'pokok' => $pokok,
                'bunga' => $bungaPerBulan,
                'total_bayar' => $pokok + $bungaPerBulan,
                'tanggal_bayar' => Carbon::parse($pinjaman->tanggal_pinjaman)->addMonths($i),
                'status' => 'belum',
            ]);
        }

        return $pinjaman;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_pinjaman'  => 'required|numeric',
            'tenor'            => 'required|integer',
            'status'           => 'required|string',
            'tanggal_pinjaman' => 'required|date',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);

        $bunga = 2;

        $total = $request->jumlah_pinjaman +
                 ($request->jumlah_pinjaman * $bunga / 100);

        $pinjaman->update([
            'jumlah_pinjaman'  => $request->jumlah_pinjaman,
            'bunga_persen'     => $bunga,
            'tenor'            => $request->tenor,
            'status'           => $request->status,
            'tanggal_pinjaman' => $request->tanggal_pinjaman,
            'total_pinjaman'   => $total,
            'approved_by'      => $request->approved_by,
        ]);

        return $pinjaman;
    }

    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();

        return response()->json([
            'message' => 'Data pinjaman berhasil dihapus'
        ]);
    }
}
