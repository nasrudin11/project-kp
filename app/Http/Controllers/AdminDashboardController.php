<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\HargaProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        $data = [];
    
        // Tentukan tanggal awal dan akhir bulan ini
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
    
        // Tentukan tanggal-tanggal pada bulan ini yang jatuh pada hari Senin dan Kamis
        $dates = [];
        for ($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addDay()) {
            if ($date->isMonday() || $date->isThursday()) {
                $dates[] = $date->format('Y-m-d');
            }
        }
    
        // Ambil semua produk
        $produkList = Produk::all();
    
        // Ambil data harga produk berdasarkan tipe harga, pada tanggal yang ditentukan
        $hargaProduk = HargaProduk::whereIn('tipe_harga', ['pengecer', 'grosir', 'produsen'])
            ->whereIn('tgl_entry', $dates)
            ->get();
    
        // Memproses data harga
        foreach ($hargaProduk as $harga) {
            $data[$harga->tipe_harga][$harga->produk->nama_produk][$harga->tgl_entry] = (int)$harga->harga;
        }
    
        // Memastikan semua produk ditampilkan meskipun tidak ada data harga
        foreach (['pengecer', 'grosir', 'produsen'] as $tipeHarga) {
            foreach ($produkList as $produk) {
                $namaProduk = $produk->nama_produk;
                $productData = [];
                foreach ($dates as $date) {
                    // Jika data harga untuk tanggal tertentu tidak ada, atur harga ke 0
                    $productData[] = $data[$tipeHarga][$namaProduk][$date] ?? 0;
                }
                $chartData[$tipeHarga][] = [
                    'name' => $namaProduk,
                    'data' => $productData
                ];
            }
        }
    
        // Format tanggal untuk ditampilkan pada grafik
        $datesFormatted = array_map(function($date) {
            return Carbon::parse($date)->format('d M');
        }, $dates);
    
        return view('dashboard.admin.index', compact('chartData', 'datesFormatted'), ['title' => 'Dashboard']);
    }
    
    
    
}
