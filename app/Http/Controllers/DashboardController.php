<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;

        switch ($role) {
            case 'pengecer':
                // Logika untuk pengecer
                return view('dashboard.user.index', ['title' => 'Dashboard Pengecer']);
            case 'grosir':
                // Logika untuk grosir
                return view('dashboard.user.index', ['title' => 'Dashboard Grosir']);
            case 'produsen':
                // Logika untuk produsen
                return view('dashboard.user.index', ['title' => 'Dashboard Produsen']);
        }
    }
}
