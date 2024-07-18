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

            if ($user->role == 'admin' && $role != 'admin') {
                return redirect('/dashboard');
            } elseif ($role == 'user' && !in_array($user->role, ['pengecer', 'grosir', 'produsen'])) {
                return redirect('/admin-dashboard');
            }

            return $next($request);
        }

        return redirect('/login');
    }
}
