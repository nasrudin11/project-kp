<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Pasar;
use App\Models\Kecamatan;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $pasars = Pasar::all();
        $kecamatans = Kecamatan::all();
        return view('dashboard.admin.data-lokasi', compact('pasars', 'kecamatans'), ['title'=>'Data Lokasi']);
    }

    public function storePasar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pasar' => 'required|unique:pasar,nama_pasar',
            'alamat_pasar' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('error', 'Gagal Menambahkan Data'); 
        }

        Pasar::create($request->all());

        return redirect()->back()->with('success', 'Data pasar berhasil ditambahkan.');
    }



    public function updatePasar(Request $request, $id)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'nama_pasar' => 'required|string|max:35',
                'alamat_pasar' => 'nullable|string|max:20'
            ]);

            $pasar = Pasar::findOrFail($id);
            $pasar->nama_pasar = $request->input('nama_pasar');
            $pasar->alamat_pasar = $request->input('alamat_pasar');
            $pasar->save();

            return redirect()->back()->with('success', 'Data Pasar berhasil diperbarui.');
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            if (preg_match('/Duplicate entry/', $errorMessage)) {
                $errorMessage = 'Nama pasar sudah ada, gunakan nama lain.';
            }
            return back()->with('error', $errorMessage);
        }
    }

    

    // Delete Pasar
    public function destroyPasar($id)
    {
        try {
            $pasar = Pasar::findOrFail($id);
            $pasar->delete();

            return redirect()->back()->with('success', 'Data Pasar berhasil dihapus.');
        } catch (Exception $e) {
            // Handle the exception (e.g., log it, send an error message, etc.)
            return redirect()->back()->with('error', 'Gagal menghapus data Pasar. Pastikan data tidak terkait dengan entitas lain.');
        }
    }

    
    public function storeKecamatan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kecamatan' => 'required|unique:kecamatan,nama_kecamatan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('error', 'Gagal Menambahkan Data'); // Menambahkan informasi ke sesi
        }

        Kecamatan::create($request->all());

        return redirect()->back()->with('success', 'Data kecamatan berhasil ditambahkan.');
    }


    public function updateKecamatan(Request $request, $id)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'nama_kecamatan' => 'required|string|max:35'
            ]);

            $kecamatan = Kecamatan::findOrFail($id);
            $kecamatan->nama_kecamatan = $request->input('nama_kecamatan');
            $kecamatan->save();

            return redirect()->back()->with('success', 'Data Kecamatan berhasil diperbarui.');
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            if (preg_match('/Duplicate entry/', $errorMessage)) {
                $errorMessage = 'Nama kecamatan sudah ada, gunakan nama lain.';
            }
            return back()->with('error', $errorMessage);
        }
    }

    // Delete Kecamatan
    public function destroyKecamatan($id)
    {
        try {
            $kecamatan = Kecamatan::findOrFail($id);
            $kecamatan->delete();

            return redirect()->back()->with('success', 'Data Kecamatan berhasil dihapus.');
        } catch (Exception $e) {
            // Handle the exception (e.g., log it, send an error message, etc.)
            return redirect()->back()->with('error', 'Gagal menghapus data Kecamatan. Pastikan data tidak terkait dengan entitas lain.');
        }
    }


}
