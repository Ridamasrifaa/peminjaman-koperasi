<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('admin.editprofile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // validasi input
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // jika ada upload baru
        if($request->hasFile('avatar')){
            // hapus foto lama jika ada
            if($user->avatar){
                Storage::delete('public/avatars/'.$user->avatar);
            }

            $file = $request->file('avatar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/avatars', $filename);

            $user->avatar = $filename;
        }

        $user->save();

        return redirect('/admin/profile')->with('success', 'Profile berhasil diupdate!');
    }
}
