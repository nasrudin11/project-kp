<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\HargaProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        $role = $user->role;
        $userId = $user->id;
        $data = [];
    
        // Fetch product prices for the current month on Mondays and Thursdays
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
    
        $dates = [];
        for ($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addDay()) {
            if ($date->isMonday() || $date->isThursday()) {
                $dates[] = $date->format('Y-m-d');
            }
        }
    
        // Fetch data based on role
        $tipeHargaList = $role == 'pedagang' ? ['pengecer', 'grosir'] : ['produsen'];
        
        $hargaProduk = HargaProduk::whereIn('tipe_harga', $tipeHargaList)
            ->where('id_user', $userId)
            ->whereIn('tgl_entry', $dates)
            ->get();
    
        // Fetch all products
        $produkList = Produk::all()->keyBy('nama_produk');
    
        // Process data
        foreach ($hargaProduk as $harga) {
            $data[$harga->tipe_harga][$harga->produk->nama_produk][$harga->tgl_entry] = (int)$harga->harga;
        }
    
        // Ensure all products have data for all dates
        foreach ($produkList as $namaProduk => $produk) {
            foreach ($tipeHargaList as $tipeHarga) {
                if (!isset($data[$tipeHarga][$namaProduk])) {
                    $data[$tipeHarga][$namaProduk] = array_fill_keys($dates, 0);
                } else {
                    foreach ($dates as $date) {
                        if (!isset($data[$tipeHarga][$namaProduk][$date])) {
                            $data[$tipeHarga][$namaProduk][$date] = 0;
                        }
                    }
                }
            }
        }
    
        $chartData = [];
        foreach ($data as $tipeHarga => $products) {
            foreach ($products as $product => $prices) {
                $productData = [];
                foreach ($dates as $date) {
                    $productData[] = $prices[$date] ?? 0;
                }
                $chartData[$tipeHarga][] = [
                    'name' => $product,
                    'data' => $productData
                ];
            }
        }
    
        $datesFormatted = array_map(function($date) {
            return Carbon::parse($date)->format('d M');
        }, $dates);
    
        return view('dashboard.user.index', compact('chartData', 'datesFormatted', 'role'), ['title' => 'Dashboard']);
    }
    
    
}
