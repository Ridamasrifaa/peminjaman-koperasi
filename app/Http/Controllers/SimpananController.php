<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index()
    {
        return Simpanan::with('user')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'jenis_simpanan' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date'
        ]);

        $simpanan = Simpanan::create($request->all());

        return response()->json([
            'message' => 'Simpanan berhasil disimpan',
            'data' => $simpanan
        ]);
    }
}
