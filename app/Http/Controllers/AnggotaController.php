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

   
    public function show($id)
    {
        return Anggota::find($id);
    }

    
    public function create()
    {
        return view('admin.tambah-anggota');
    }

   
    public function store(Request $request)
    {
       $validated = $request->validate([
    'nama'  => 'required|string|max:255',
    'email' => 'required|email|unique:users,email',
   'no_hp' => 'required|numeric|digits_between:10,15',
    'password' => 'required|min:8'
],[
    'nama.required' => 'Nama wajib diisi',
    'email.required' => 'Email wajib diisi',
    'email.email' => 'Format email tidak valid',
    'email.unique' => 'Email sudah digunakan',
    'no_hp.numeric' => 'Nomor telepon harus berupa angka',
'no_hp.digits_between' => 'Nomor telepon harus 10-15 digit',
    'password.required' => 'Password wajib diisi',
    'password.min' => 'Password minimal 8 karakter'
]);
        DB::beginTransaction();

        try {

           
        $user = User::create([
    'nama'     => $validated['nama'],
    'email'    => $validated['email'],
    'password' => Hash::make($validated['password']),
    'role'     => 'anggota',
]);

            
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

  
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.edit_anggota', compact('anggota'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);

        $anggota->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email
        ]);

        return redirect('/admin/pencarian')
            ->with('success','Data berhasil diupdate');
    }

   
public function destroy($id)
{
    $anggota = Anggota::findOrFail($id);

    foreach ($anggota->pinjaman as $pinjaman) {

        $belumLunas = $pinjaman->angsuran()
            ->where('status','!=','lunas')
            ->exists();

        if ($belumLunas) {
            return redirect('/admin/pencarian')
            ->with('error','Anggota tidak bisa dihapus karena masih memiliki pinjaman');
        }
    }

    foreach ($anggota->pinjaman as $pinjaman) {
        $pinjaman->angsuran()->delete();
    }

    $anggota->pinjaman()->delete();
    $anggota->delete();

    return redirect('/admin/pencarian')
        ->with('success','Data berhasil dihapus');
}
  
}