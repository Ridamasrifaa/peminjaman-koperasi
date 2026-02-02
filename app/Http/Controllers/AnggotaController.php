<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index() {
        return Anggota::all();
    }

    public function store(Request $request) {
        return Anggota::create($request->all());
    }

    public function show($id) {
        return Anggota::find($id);
    }

    public function update(Request $request, $id) {
        $anggota = Anggota::find($id);
        $anggota->update($request->all());
        return $anggota;
    }

    public function destroy($id) {
        Anggota::destroy($id);
        return ['message' => 'deleted'];
    }
}
