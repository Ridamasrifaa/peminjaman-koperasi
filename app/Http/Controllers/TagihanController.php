<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function bayar(Request $request, $id)
{
    // cek PIN sesuai user yang login
    if ($request->pin != auth()->user()->pin) {
        return back()->with('error', 'PIN salah!');
    }

    $tagihan = Angsuran::findOrFail($id);

    $tagihan->status = 'lunas';
    $tagihan->tanggal_bayar = now();
    $tagihan->dibayar_oleh = auth()->id();
    $tagihan->save();

    return back()->with('success', 'Tagihan berhasil dibayar');
}
}
