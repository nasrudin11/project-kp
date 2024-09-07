<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\HargaProduk;

use Illuminate\Http\Request;

class ExportChart extends Controller
{
    public function index() {
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
        $hargaProduk = HargaProduk::whereIn('tipe_harga', ['pengecer', 'grosir', 'produsen'])
            ->whereIn('tgl_entry', $dates)
            ->get();
        
        // Process data
        foreach ($hargaProduk as $harga) {
            $data[$harga->tipe_harga][$harga->produk->nama_produk][$harga->tgl_entry] = (int)$harga->harga;
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
        
        return view('pdf.chart', compact('chartData', 'datesFormatted'), ['title' => 'Dashboard']);
    }
}
