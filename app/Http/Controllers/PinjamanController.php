<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    // GET /api/pinjaman
    public function index()
    {
        return Pinjaman::with('anggota')->get();
    }

    // GET /api/pinjaman/{id}
    public function show($id)
    {
        return Pinjaman::with('anggota')->findOrFail($id);
    }

    // POST /api/pinjaman
    public function store(Request $request)
    {
        $request->validate([
            'jumlah_pinjaman'  => 'required|numeric',
            'tenor'            => 'required|integer',
            'tanggal_pinjaman' => 'required|date',
        ]);

        
        $bunga = 2; // 2%

        $total = $request->jumlah_pinjaman +
                 ($request->jumlah_pinjaman * $bunga / 100);

        return Pinjaman::create([
            'anggota_id' => auth()->id(),
            'approved_by'      => null,
            'jumlah_pinjaman'  => $request->jumlah_pinjaman,
            'bunga_persen'     => $bunga,
            'tenor'            => $request->tenor,
            'status'           => 'pending',
            'tanggal_pinjaman' => $request->tanggal_pinjaman,
            'total_pinjaman'   => $total,
        ]);
    }

    // PUT /api/pinjaman/{id}
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_pinjaman'  => 'required|numeric',
            'tenor'            => 'required|integer',
            'status'           => 'required|string',
            'tanggal_pinjaman' => 'required|date',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);

        // bunga tetap 2%
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

    // DELETE /api/pinjaman/{id}
    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();

        return response()->json([
            'message' => 'Data pinjaman berhasil dihapus'
        ]);
    }
}
