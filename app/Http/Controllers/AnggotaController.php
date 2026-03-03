<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class AnggotaController extends Controller
{
    // GET /api/anggota
    public function index(Request $request)
{
    $query = $request->get('q');

    $anggota = Anggota::when($query, function($q) use ($query) {
        $q->where('nama', 'like', "%$query%");
    })->get();

    return view('admin.pencarian', compact('anggota'));
}


    // GET /api/anggota/{id}
    public function show($id)
    {
        return Anggota::find($id);
    }
    
    
public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email', // cek di users karena login pakai tabel users
        'no_hp' => 'required|string|max:20',
    ]);

    //  akun login otomatis
    $user = User::create([
        'name' => $validated['nama'], // bisa juga diganti 'nama' kalau model User diubah
        'email' => $validated['email'],
        'password' => Hash::make('default123'), // password default
        'role' => 'anggota',
    ]);

    //  Buat record anggota
    Anggota::create([
        'nama' => $validated['nama'],
        'email' => $validated['email'],
        'no_hp' => $validated['no_hp'],
        'id_users' => $user->id,
    ]);

    return redirect('/admin/pencarian')->with('success', 'Anggota berhasil ditambahkan dan bisa login!');
}



    // PUT /api/anggota/{id}
    public function update(Request $request, $id)
    {
        $anggota = Anggota::find($id);
        $anggota->update($request->all());
        return $anggota;
    }

    // DELETE /api/anggota/{id}
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }

public function create()
{
    return view('admin.tambah-anggota');
}


}