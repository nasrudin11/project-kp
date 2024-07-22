<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       
    $users = User::whereIn('role', ['pedagang', 'produsen'])->get();

    return view('dashboard.admin.akun-user', compact('users'), ['title'=>'Akun User']);

    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:35',
            'email' => 'required|string|max:35, unique',
            'password' => 'required|string|max:20',
            'gambar_profil' => 'nullable|image|file|max:2048',
            'role' => 'required|in:pedagang,produsen',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];

        // Simpan gambar_profil jika ada
        if ($request->hasFile('gambar_profil')) {
            $user->gambar_profil = $request->file('gambar_profil')->store('profil-img', 'public');
        }

        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('user.index')->with('success', 'Produk berhasil ditambahkan.');
    }
}
