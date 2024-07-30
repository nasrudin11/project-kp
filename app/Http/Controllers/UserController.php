<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasar;
use App\Models\Kecamatan;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
       
    $users = User::whereIn('role', ['pedagang', 'produsen'])->get();
    $pasar = Pasar::all();
    $kecamatan = Kecamatan::all();

    return view('dashboard.admin.akun-user', compact('users', 'pasar', 'kecamatan'), ['title'=>'Data Akun User']);
          

    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:35',
            'email' => 'required|string|email|max:35|unique:users,email',
            'password' => 'required|string|min:8',
            'gambar_profil' => 'nullable|image|file|max:2048',
            'role' => 'required|in:pedagang,produsen',
            'id_pasar' => 'nullable|integer',
            'id_kecamatan' => 'nullable|integer',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string|in:laki-laki,perempuan',
            'alamat' => 'nullable|string|max:255',
            'no_tlp' => 'nullable|string|max:15',
        ]);
    
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->role = $validated['role'];
        $user->id_pasar = Arr::get($validated, 'id_pasar');
        $user->id_kecamatan = Arr::get($validated, 'id_kecamatan');
        $user->tanggal_lahir = Arr::get($validated, 'tanggal_lahir');
        $user->jenis_kelamin = Arr::get($validated, 'jenis_kelamin');
        $user->alamat = Arr::get($validated, 'alamat');
        $user->no_tlp = Arr::get($validated, 'no_tlp');

    
        // Simpan gambar_profil jika ada
        if ($request->hasFile('gambar_profil')) {
            $user->gambar_profil = $request->file('gambar_profil')->store('profil-img', 'public');
        }
    
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }
    

    public function update_profile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'alamat' => 'nullable|string|max:255',
            'gambar_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:4048',
            'no_tlp' => 'nullable|string|max:15',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string|in:laki-laki,perempuan',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->alamat = $request->input('alamat');
        $user->no_tlp = $request->input('no_tlp');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->jenis_kelamin = $request->input('jenis_kelamin');

        if ($request->hasFile('gambar_profil')) {
            // Hapus gambar lama jika ada
            if ($user->gambar_profil) {
                Storage::delete('public/' . $user->gambar_profil);
            }
            $user->gambar_profil = $request->file('gambar_profil')->store('profil-img', 'public');
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input dengan aturan kombinasi huruf dan angka
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[A-Za-z]/', 'regex:/[0-9]/'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }


    public function editProfileAkunUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        // Mengambil data pasar dan kecamatan dari database
        $pasar = Pasar::all();
        $kecamatan = Kecamatan::all();
    
        return view('dashboard.admin.profile-akun-user', [
            'title' => 'Profile Akun User',
            'user' => $user,
            'pasar' => $pasar,
            'kecamatan' => $kecamatan
        ]);
    }
    
    public function updateProfile_akunUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'alamat' => 'nullable|string|max:255',
            'gambar_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:4048',
            'no_tlp' => 'nullable|string|max:15',
            'role' => 'required',
            'id_pasar' => 'nullable|integer',
            'id_kecamatan' => 'nullable|integer',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string|in:laki-laki,perempuan',
        ]);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->alamat = $request->input('alamat');
        $user->no_tlp = $request->input('no_tlp');
        $user->role = $request->input('role');
        $user->id_pasar = $request->input('id_pasar');
        $user->id_kecamatan = $request->input('id_kecamatan');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
    
        if ($request->hasFile('gambar_profil')) {
            // Hapus gambar lama jika ada
            if ($user->gambar_profil) {
                Storage::delete('public/' . $user->gambar_profil);
            }
            $user->gambar_profil = $request->file('gambar_profil')->store('profil-img', 'public');
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    
    
    public function updatePassword__akunUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[A-Za-z]/', 'regex:/[0-9]/'],
        ]);
    
        $user->password = Hash::make($request->input('password'));
        $user->save();
    
        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
    

    
}
