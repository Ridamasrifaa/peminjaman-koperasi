<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;


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
    
    // POST /api/anggota
public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:20',
        'id_users' => 'required|integer',
    ]);

    Anggota::create($validated);

    return redirect('/admin/pencarian')->with('success', 'Anggota berhasil ditambahkan!');
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