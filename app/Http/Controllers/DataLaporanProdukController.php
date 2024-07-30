<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pasar;
use App\Models\Produk;
use App\Models\Satuan;
use App\Models\Kecamatan;
use App\Models\HargaProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataLaporanProdukController extends Controller
{

    public function index(Request $request)
    {
        $pasars = Pasar::all(); 
        $kecamatans = Kecamatan::all();

        // Mendapatkan pengguna yang sedang login
        $user = auth()->user();

        // Menentukan bulan saat ini dan nama bulan
        $currentMonth = Carbon::now()->format('m');
        $currentMonthName = Carbon::now()->format('F Y');
        
        // Mendapatkan tanggal Senin dan Kamis untuk bulan saat ini
        $dates = $this->getWeeklyDates($currentMonth);

        // Menampilkan semua data harga produk untuk admin
        $dataProdusen = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
                                ->where('harga_produk.tipe_harga', 'produsen')
                                ->select('produk.*', 'harga_produk.*')
                                ->whereIn('produk.target', ['produsen', 'keduanya'])
                                ->get()
                                ->groupBy('id_produk');

        $dataPengecer = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
                                ->where('harga_produk.tipe_harga', 'pengecer')
                                ->select('produk.*', 'harga_produk.*')
                                ->whereIn('produk.target', ['pengecer', 'keduanya'])
                                ->get()
                                ->groupBy('id_produk');

        $dataGrosir = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
                                ->where('harga_produk.tipe_harga', 'grosir')
                                ->select('produk.*', 'harga_produk.*')
                                ->whereIn('produk.target', ['grosir', 'keduanya'])
                                ->get()
                                ->groupBy('id_produk');

        return view('dashboard.admin.data-harga', [
            'user' => $user,
            'pasars' => $pasars,
            'kecamatans' => $kecamatans,
            'dataProdusen' => $dataProdusen,
            'dataPengecer' => $dataPengecer,
            'dataGrosir' => $dataGrosir,
            'dates' => $dates,
            'currentMonthName' => $currentMonthName,
            'title' => 'Data Harga'
        ]);

        return view('dashboard.admin.data-harga', compact('pasars', 'kecamatans'), ['title' => 'Data Harga',]);
    }

    public function index_harga_user(Request $request)
    {
        $idUser = auth()->user()->id;
        $user = auth()->user();
        
        // Menentukan bulan saat ini
        $currentMonth = Carbon::now()->format('m');
        $currentMonthName = Carbon::now()->format('F Y');
        
        // Mendapatkan tanggal-tanggal Senin dan Kamis untuk bulan ini
        $dates = $this->getWeeklyDates($currentMonth);
    
        // Prepare data based on user role
        if ($user->role == 'produsen') {
            $dataProdusen = Produk::leftJoin('harga_produk', function($join) use ($idUser) {
                                        $join->on('produk.id_produk', '=', 'harga_produk.id_produk')
                                             ->where('harga_produk.tipe_harga', 'produsen')
                                             ->where('harga_produk.id_user', $idUser);
                                    })
                                    ->select('produk.*', 'harga_produk.*')
                                    ->whereIn('produk.target', ['produsen', 'keduanya'])
                                    ->get()
                                    ->groupBy('id_produk');
            
            return view('dashboard.user.data-harga', [
                'user' => $user,
                'dataProdusen' => $dataProdusen,
                'dates' => $dates,
                'currentMonthName' => $currentMonthName,
                'title' => 'Data Harga'
            ]);
    
        } else {
            $dataPengecer = Produk::leftJoin('harga_produk', function($join) use ($idUser) {
                                        $join->on('produk.id_produk', '=', 'harga_produk.id_produk')
                                             ->where('harga_produk.tipe_harga', 'pengecer')
                                             ->where('harga_produk.id_user', $idUser);
                                    })
                                    ->select('produk.*', 'harga_produk.*')
                                    ->whereIn('produk.target', ['pengecer', 'keduanya'])
                                    ->get()
                                    ->groupBy('id_produk');
    
            $dataGrosir = Produk::leftJoin('harga_produk', function($join) use ($idUser) {
                                        $join->on('produk.id_produk', '=', 'harga_produk.id_produk')
                                             ->where('harga_produk.tipe_harga', 'grosir')
                                             ->where('harga_produk.id_user', $idUser);
                                    })
                                    ->select('produk.*', 'harga_produk.*')
                                    ->whereIn('produk.target', ['grosir', 'keduanya'])
                                    ->get()
                                    ->groupBy('id_produk');

    
            return view('dashboard.user.data-harga', [
                'user' => $user,
                'dataPengecer' => $dataPengecer,
                'dataGrosir' => $dataGrosir,
                'dates' => $dates,
                'currentMonthName' => $currentMonthName,
                'title' => 'Data Harga'
            ]);
        }
    }   

    public function index_pasokan_user(Request $request)
    {
        $idUser = auth()->user()->id;
    
        // Menentukan bulan saat ini
        $currentMonth = Carbon::now()->format('m');
        $currentMonthName = Carbon::now()->format('F Y');
    
        // Mendapatkan tanggal-tanggal Senin dan Kamis untuk bulan ini
        $dates = $this->getWeeklyDates($currentMonth);
    
        // Mengambil data harga_produk dengan join ke tabel produk dan filter berdasarkan target
        $dataPengecer = HargaProduk::where('id_user', $idUser)
            ->where('tipe_harga', 'pengecer')
            ->leftJoin('produk', function ($join) {
                $join->on('harga_produk.id_produk', '=', 'produk.id_produk')
                    ->whereIn('produk.target', ['pedagang', 'keduanya']);
            })
            ->select('harga_produk.*', 'produk.nama_produk')
            ->get();
    
        $dataGrosir = HargaProduk::where('id_user', $idUser)
            ->where('tipe_harga', 'grosir')
            ->leftJoin('produk', function ($join) {
                $join->on('harga_produk.id_produk', '=', 'produk.id_produk')
                    ->whereIn('produk.target', ['pedagang', 'keduanya']);
            })
            ->select('harga_produk.*', 'produk.nama_produk')
            ->get();
    
        return view('dashboard.user.data-pasokan', [
            'dataPengecer' => $dataPengecer->groupBy('id_produk'),
            'dataGrosir' => $dataGrosir->groupBy('id_produk'),
            'dates' => $dates,
            'currentMonthName' => $currentMonthName,
            'title' => 'Data Pasokan'
        ]);
    }
    
    
    private function getWeeklyDates($month)
    {
        $startDate = Carbon::createFromFormat('m', $month)->startOfMonth();
        $dates = [];
    
        for ($week = 1; $week <= 5; $week++) {
            $monday = $startDate->copy()->startOfMonth()->addWeeks($week - 1)->startOfWeek(Carbon::MONDAY);
            $thursday = $monday->copy()->addDays(3);
    
            // Menyimpan tanggal Senin dan Kamis
            $dates[$week] = [
                'monday' => $monday->format('Y-m-d'),
                'thursday' => $thursday->format('Y-m-d')
            ];
        }
    
        return $dates;
    }
    
    public function form_input_data()
    {
        $user = Auth::user();

        if ($user->role == 'pedagang') {
            $produkList = Produk::whereIn('target', ['Pedagang', 'Keduanya'])->get();
            $title = 'Form Pedagang';
        } elseif ($user->role == 'produsen') {
            $produkList = Produk::whereIn('target', ['Produsen', 'Keduanya'])->get();
            $title = 'Form Produsen';
        } else {
            return redirect()->back()->with('error', 'Role tidak dikenal');
        }

        return view('dashboard.user.form-laporan', compact('produkList'))->with('title', $title);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'data.*.id_produk' => 'required|exists:produk,id_produk',
            'data.*.harga' => 'nullable|numeric',
            'data.*.pasokan' => 'nullable|numeric',
            'data.*.satuan_harga' => 'nullable|string',
            'data.*.satuan_pasokan' => 'nullable|string',
            'tipe_harga' => 'required|in:pengecer,grosir,produsen',
        ]);
    
        $today = Carbon::now();
    
        // Menentukan tanggal entry terdekat pada hari Senin atau Kamis dalam minggu yang sama
        if ($today->isMonday()) {
            $tglEntry = $today;
        } elseif ($today->isThursday()) {
            $tglEntry = $today;
        } elseif ($today->isBefore($today->copy()->startOfWeek()->addDays(4))) {
            // Jika hari ini sebelum hari Kamis minggu ini
            $tglEntry = $today->copy()->startOfWeek()->addDays(4); // Kamis minggu ini
        } else {
            // Jika hari ini setelah hari Kamis minggu ini
            $tglEntry = $today->copy()->startOfWeek()->addDays(7); // Senin minggu depan
        }
        $tglEntry = $tglEntry->format('Y-m-d');
    
        // Menentukan tanggal pelaporan
        $tglLaporan = $today->format('Y-m-d');
    
        $data = $request->input('data', []);
        foreach ($data as $item) {
            DB::table('harga_produk')->insert([
                'id_user' => $request->input('id_user'),
                'id_produk' => $item['id_produk'],
                'harga' => $item['harga'] ?? 0,
                'pasokan' => $item['pasokan'] ?? 0,
                'satuan_harga' => $item['satuan_harga'] ?? 'Kg',
                'satuan_pasokan' => $item['satuan_pasokan'] ?? 'Kg',
                'tgl_entry' => $tglEntry,
                'tgl_pelaporan' => $tglLaporan,
                'tipe_harga' => $request->input('tipe_harga'),
            ]);
        }
    
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    
    public function update_harga_user(Request $request)
    {

        $request->validate([
            'id_harga' => 'required|exists:harga_produk,id_harga',
            'harga' => 'required|numeric|min:0',
        ]);

        // Temukan harga berdasarkan ID
        $harga = HargaProduk::findOrFail($request->input('id_harga'));

        // Update harga
        $harga->harga = $request->input('harga');
        $harga->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Harga berhasil diperbarui.!');
    }

    

}
