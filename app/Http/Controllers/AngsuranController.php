<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{

    public function index($pinjaman_id)
    {
        return Angsuran::where('pinjaman_id', $pinjaman_id)->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'pinjaman_id' => 'required',
            'cicilan_ke' => 'required|integer',
            'pokok' => 'required|numeric',
            'bunga' => 'required|numeric',
            'total_bayar' => 'required|numeric',
            'bulan' => 'required',
            'tahun' => 'required',
            'tanggal_bayar' => 'required|date'
        ]);

        $angsuran = Angsuran::create($request->all());

        // cek apakah pinjaman sudah lunas
        $pinjaman = Pinjaman::find($request->pinjaman_id);

        $totalBayar = $pinjaman->angsuran()->sum('total_bayar');

        if ($totalBayar >= $pinjaman->total_pinjaman) {
            $pinjaman->status = 'lunas';
            $pinjaman->save();
        }

        return response()->json([
            'message' => 'Angsuran berhasil disimpan',
            'data' => $angsuran
        ]);
    }

    public function lunasiSekaligus($pinjamanId)
    {
        if (!in_array(auth()->user()->role, ['admin', 'sekertaris'])) {
            abort(403);
        }

        $pinjaman = Pinjaman::findOrFail($pinjamanId);
        $now = \Carbon\Carbon::now();

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