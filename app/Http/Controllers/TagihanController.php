<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angsuran;
use Carbon\Carbon;

class TagihanController extends Controller
{
    public function bayar(Request $request, $id)
    {
        $tagihan = Angsuran::findOrFail($id);

        $now = Carbon::now();

        $tagihan->update([
            'status' => 'lunas',
            'tanggal_bayar' => $now,
            'bulan' => $now->month,
            'tahun' => $now->year,
        ]);

        return back()->with('success', 'Tagihan berhasil dibayar');
    }
}