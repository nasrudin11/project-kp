<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Cek jika peran yang diperlukan adalah admin
            if ($role == 'admin' && $user->role != 'admin') {
                return redirect('/dashboard'); 
            }
            
            if ($role == 'user' && !in_array($user->role, ['pedagang', 'produsen'])) {
                return redirect('/admin-dashboard'); 
            }

            return $next($request);
        }

        return redirect('/login');
    }

}
