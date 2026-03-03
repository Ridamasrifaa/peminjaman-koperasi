<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\User;

class PencarianController extends Controller
{

public function index(Request $request)
{
    $query = User::with('pinjaman');

    if ($request->q) {
        $query->where('nama', 'like', '%' . $request->q . '%');
    }

    $anggota = $query->get();

    return view('pencarian', compact('anggota'));
}
}