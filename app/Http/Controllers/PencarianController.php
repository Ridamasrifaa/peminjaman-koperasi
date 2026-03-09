<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class PencarianController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::with(['user', 'pinjaman']);

        if ($request->q) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->q . '%');
            });
        }

        $anggota = $query->get();

        return view('admin.pencarian', compact('anggota'));
    }
}