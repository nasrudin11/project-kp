<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::all();
        return view('dashboard.admin.produk', compact('produks'), ['title'=>'Data Produk']);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
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

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $product = Produk::findOrFail($id);

        // Hapus gambar produk jika ada
        if ($product->gambar) {
            // Pastikan path gambar sesuai dengan path penyimpanan
            Storage::delete('public/' . $product->gambar);
        }

        $product->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }



}
