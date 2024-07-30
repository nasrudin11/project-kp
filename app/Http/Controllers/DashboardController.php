<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HargaProduk;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;
        $userId = $user->id;
        $data = [];

        // Fetch product prices for the current month on Mondays and Thursdays
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $dates = [];
        for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
            if ($date->isMonday() || $date->isThursday()) {
                $dates[] = $date->format('Y-m-d');
            }
        }

        // Fetch data based on role
        $hargaProduk = HargaProduk::whereIn('tipe_harga', $role == 'pedagang' ? ['pengecer', 'grosir'] : ['produsen'])
            ->where('id_user', $userId)
            ->whereIn('tgl_entry', $dates)
            ->get();

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

        return view('dashboard.user.index', compact('chartData', 'datesFormatted', 'role'), ['title' => 'Dashboard']);
    }
}
