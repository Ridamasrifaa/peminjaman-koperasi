<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    // GET /admin/pencarian
    public function index(Request $request)
    {
        $query = $request->get('q');

        $anggota = Anggota::when($query, function($q) use ($query) {
            $q->where('nama', 'like', "%$query%");
        })->get();

        return view('admin.pencarian', compact('anggota'));
    }

    // GET /anggota/{id}
    public function show($id)
    {
        return Anggota::find($id);
    }

    // GET /admin/anggota/create
    public function create()
    {
        return view('admin.tambah-anggota');
    }

    // POST /admin/anggota
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|string|max:20',
        ]);

        DB::beginTransaction();

        try {

            $user = User::create([
                'nama'     => $validated['nama'],
                'email'    => $validated['email'],
                'password' => Hash::make('default123'),
                'role'     => 'anggota',
            ]);

            // Buat record anggota
            Anggota::create([
                'nama'     => $validated['nama'],
                'email'    => $validated['email'],
                'no_hp'    => $validated['no_hp'],
                'id_users' => $user->id,
            ]);

            DB::commit();

            return redirect('/admin/pencarian')
                ->with('success', 'Anggota berhasil ditambahkan dan bisa login!');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $anggota = Anggota::find($id);
        $anggota->update($request->all());

        return $anggota;
    }

    // DELETE
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}