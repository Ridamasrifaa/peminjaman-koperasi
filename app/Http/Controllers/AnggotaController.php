<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;


class AnggotaController extends Controller
{
    // GET /api/anggota
    public function index()
    {
        return Anggota::all();
    }

    // GET /api/anggota/{id}
    public function show($id)
    {
        return Anggota::find($id);
    }
    
    // POST /api/anggota
    public function store(Request $request)
    {
        return Anggota::create($request->all());
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
}