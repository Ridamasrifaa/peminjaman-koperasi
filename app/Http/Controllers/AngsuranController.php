<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
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
            'angsuran_ke' => 'required|integer',
            'jumlah' => 'required|numeric',
            'tanggal_bayar' => 'required|date'
        ]);

        $angsuran = Angsuran::create($request->all());

        return response()->json([
            'message' => 'Angsuran berhasil disimpan',
            'data' => $angsuran
        ]);
    }
}
