<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use App\Models\Kecamatan;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.data-lokasi', ['title'=>'Data ']);
    }

    public function getPasarData()
    {
        $pasar = Pasar::query();

        return DataTables::of($pasar)
            ->addIndexColumn()
            ->make(true);
    }

    public function getKecamatanData()
    {
        $kecamatan = Kecamatan::query();

        return DataTables::of($kecamatan)
            ->addIndexColumn()
            ->make(true);
    }

    public function updateLokasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'type' => 'required|string|in:pasar,kecamatan',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255', // alamat hanya diperlukan untuk pasar
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $type = $request->type;
        $id = $request->id;
        $nama = $request->nama;
        $alamat = $request->alamat;

        if ($type == 'pasar') {
            // Cek apakah nama pasar sudah ada, kecuali yang sedang di-update
            $existingPasar = Pasar::where('nama_pasar', $nama)
                                ->where('id_pasar', '!=', $id)
                                ->first();
            if ($existingPasar) {
                return response()->json(['errors' => ['nama' => ['Nama pasar sudah ada.']]], 400);
            }

            $pasar = Pasar::findOrFail($id);
            $pasar->nama_pasar = $nama;
            $pasar->alamat_pasar = $alamat;
            $pasar->save();
        } else if ($type == 'kecamatan') {
            // Cek apakah nama kecamatan sudah ada, kecuali yang sedang di-update
            $existingKecamatan = Kecamatan::where('nama_kecamatan', $nama)
                                        ->where('id_kecamatan', '!=', $id)
                                        ->first();
            if ($existingKecamatan) {
                return response()->json(['errors' => ['nama' => ['Nama kecamatan sudah ada.']]], 400);
            }

            $kecamatan = Kecamatan::findOrFail($id);
            $kecamatan->nama_kecamatan = $nama;
            $kecamatan->save();
        }

        return response()->json(['success' => 'Data berhasil diupdate']);
    }



    public function deleteLokasi($id, Request $request)
    {
        $type = $request->type;
        if ($type == 'pasar') {
            Pasar::destroy($id);
        } else if ($type == 'kecamatan') {
            Kecamatan::destroy($id);
        }
        return response()->json(['success' => 'Data berhasil dihapus']);
    }


}
