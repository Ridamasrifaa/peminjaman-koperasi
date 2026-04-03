<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User berhasil dihapus'
        ]);
    }


    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update([
        'role' => $request->role
    ]);

    return $user;
}

}
