<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // normalize semua role ke lowercase untuk menghindari masalah casing
        $userRole = strtolower($user->role);
        $allowedRoles = array_map('strtolower', $roles);

        if (!in_array($userRole, $allowedRoles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
