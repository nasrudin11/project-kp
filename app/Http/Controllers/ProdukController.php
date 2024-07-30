<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('dashboard.admin.produk',compact('produks'), ['title' => 'Data Produk']);
    }

    public function getProdukData()
    {
        return datatables()->of(Produk::query())
            ->addIndexColumn() // Menambahkan nomor urut
            ->addColumn('aksi', function ($produk) {
                return '
                    <button class="btn btn-primary btn-sm" onclick="editProduk(' . $produk->id_produk . ', \'' . $produk->nama_produk . '\', \'' . $produk->target . '\', \'' . $produk->gambar . '\')">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(' . $produk->id_produk . ', \'produk\')">Hapus</button>
                ';
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:35|unique:produk,nama_produk',
            'gambar' => 'nullable|image|file|max:2048',
            'target' => 'required|in:Produsen,Pedagang,Keduanya',
        ]);

        $produk = new Produk();
        $produk->nama_produk = $validated['nama_produk'];

        // Simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $produk->gambar = $request->file('gambar')->store('produk-img', 'public');
        }

        $produk->target = $validated['target'];
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        try{
            // Validasi input
            $validated = $request->validate([
                'nama_produk' => 'required|string|max:35',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'target' => 'required|in:Produsen,Pedagang,Keduanya',
            ]);

            $product = Produk::findOrFail($id);
            $product->nama_produk = $validated['nama_produk'];

            // Simpan gambar jika ada
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($product->gambar) {
                    Storage::delete('public/' . $product->gambar);
                }
                $product->gambar = $request->file('gambar')->store('produk-img', 'public');
            }

            $product->target = $validated['target'];
            $product->save();

            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
        }catch(Exception $e){
            $errorMessage = $e->getMessage();
            if (preg_match('/Duplicate entry/', $errorMessage)) {
                $errorMessage = 'Nama produk sudah ada, gunakan nama lain.';
            }
            return back()->with('error', $errorMessage);
        }
        
    }

    public function delete($id)
    {
        $produk = Produk::find($id);

        if ($produk) {
            $produk->delete();
            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        } else {
            return back()->with('error', 'Produk gagal dihapus');
        }
    }

}
