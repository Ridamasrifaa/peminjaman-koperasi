<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\User;

class PencarianController extends Controller
{

public function index()
{
    $data = Pinjaman::join('users', 'pinjaman.anggota_id', '=', 'users.id')
        ->select('pinjaman.id as pinjaman_id', 'users.nama', 'pinjaman.jumlah_pinjaman')
        ->get();

    return view('pencarian', compact('data'));
}

}
