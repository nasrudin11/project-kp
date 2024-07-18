<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $key = 'login.' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 2)) {
            $retryAfter = RateLimiter::availableIn($key);
            return back()->with('retryAfter', $retryAfter);
        }

        // Validasi kredensial
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/admin-dashboard');
            } else {
                return redirect()->intended('/dashboard');
            }
        }
    }  

    public function logout() {
        Auth::logout();
     
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect('/');
    }
    
   
}
