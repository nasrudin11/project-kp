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

        $currentMonth = Carbon::now()->format('m');
        $currentMonthName = Carbon::now()->format('F Y');
        $dates = $this->getWeeklyDates($currentMonth);

        $idPasar = $request->get('id_pasar', 'semua');
        $idKecamatan = $request->get('id_kecamatan', 'semua');
        $activeTab = $request->get('active_tab', 'tab-pasar');

        // Initialize data variables
        $dataPengecer = $dataGrosir = $dataDetailPengecer = $dataDetailGrosir = $dataKecamatan = $dataDetailProdusen = null;

            if ($idPasar == 'semua') {
                // Call the private method for Pasar
                $data = $this->getDataPasar($request);
                $dataPengecer = $data['dataPengecer'] ?? null;
                $dataGrosir = $data['dataGrosir'] ?? null;
                $activeTab == 'tab-pasar';

            } elseif($idPasar != 'semua') {
                // Call the private method for Pasar with detail
                $dataDetail = $this->getDataPasar($request);
                $dataDetailPengecer = $dataDetail['dataDetailPengecer'] ?? null;
                $dataDetailGrosir = $dataDetail['dataDetailGrosir'] ?? null;
                $activeTab == 'tab-pasar';
            }

            if ($idKecamatan == 'semua') {
                // Call the private method for Kecamatan
                $dataKecamatan = $this->getDataKecamatan($request)['dataKecamatan'] ?? null;
                $activeTab == 'tab-kecamatan';
            } elseif($idKecamatan != 'semua') {
                // Call the private method for Kecamatan with detail
                $dataDetailProdusen = $this->getDataKecamatan($request)['dataDetailProdusen'] ?? null;
                $activeTab == 'tab-kecamatan';
            }

        return view('dashboard.admin.data-harga', [
            'pasars' => $pasars,
            'kecamatans' => $kecamatans,
            'id_pasar' => $idPasar,
            'id_kecamatan' => $idKecamatan,
            'dataPengecer' => $dataPengecer,
            'dataGrosir' => $dataGrosir,
            'dataDetailPengecer' => $dataDetailPengecer,
            'dataDetailGrosir' => $dataDetailGrosir,
            'dataProdusen' => $dataKecamatan,
            'dataDetailProdusen' => $dataDetailProdusen,
            'dates' => $dates,
            'currentMonthName' => $currentMonthName,
            'active_tab' => $activeTab,
            'title' => 'Data Harga'
        ]);
    }


    private function getDataPasar(Request $request)
    {
        $idPasar = $request->get('id_pasar', 'semua');
        $pasars = Pasar::all();
        $kecamatans = Kecamatan::all();
        $currentMonth = Carbon::now()->format('m');
        $currentMonthName = Carbon::now()->format('F Y');
        $currentYear = Carbon::now()->format('Y');
        $dates = $this->getWeeklyDates($currentMonth);

        // Ambil nilai active_tab dari request
        $activeTab = $request->get('active_tab', 'tab-pasar');

        if ($idPasar === 'semua') {
            // Rata-rata harga pengecer
            $dataPengecer = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
                ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
                ->select('produk.id_produk', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'users.id_pasar')
                ->where('harga_produk.tipe_harga', 'pengecer')
                ->where(function($query) {
                    $query->where('produk.target', 'Pedagang')
                        ->orWhere('produk.target', 'Keduanya');
                })
                ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_pasar')
                ->get()
                ->groupBy('komoditi');

            // Rata-rata harga grosir
            $dataGrosir = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
                ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
                ->select('produk.id_produk', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'users.id_pasar')
                ->where('harga_produk.tipe_harga', 'grosir')
                ->where(function($query) {
                    $query->where('produk.target', 'Pedagang')
                        ->orWhere('produk.target', 'Keduanya');
                })
                ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_pasar')
                ->get()
                ->groupBy('komoditi');

            return [
                'dataPengecer' => $dataPengecer,
                'dataGrosir' => $dataGrosir,
                'pasars' => $pasars,
                'kecamatans' => $kecamatans,
                'currentMonthName' => $currentMonthName,
                'dates' => $dates,
                'active_tab' => $activeTab
            ];
        } else {
            // Data harga pasar detail berdasarkan id_pasar
            $dataDetailPengecer = HargaProduk::leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
                ->leftJoin('produk', 'harga_produk.id_produk', '=', 'produk.id_produk')
                ->where('users.id_pasar', $idPasar)
                // ->whereMonth('harga_produk.tgl_entry', $currentMonth)
                ->whereYear('harga_produk.tgl_entry', $currentYear)
                ->where('harga_produk.tipe_harga', 'pengecer')
                ->select('harga_produk.*', 'produk.nama_produk')
                ->get()
                ->groupBy('produk.id_produk');

            $dataDetailGrosir = HargaProduk::leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
                ->leftJoin('produk', 'harga_produk.id_produk', '=', 'produk.id_produk')
                ->where('users.id_pasar', $idPasar)
                // ->whereMonth('harga_produk.tgl_entry', $currentMonth)
                ->whereYear('harga_produk.tgl_entry', $currentYear)
                ->where('harga_produk.tipe_harga', 'grosir')
                ->select('harga_produk.*', 'produk.nama_produk')
                ->get()
                ->groupBy('produk.id_produk');

            return [
                'dataDetailPengecer' => $dataDetailPengecer,
                'dataDetailGrosir' => $dataDetailGrosir,
                'pasars' => $pasars,
                'kecamatans' => $kecamatans,
                'currentMonthName' => $currentMonthName,
                'dates' => $dates,
                'active_tab' => $activeTab
            ];
        }
    }

    private function getDataKecamatan(Request $request)
    {
        $idKecamatan = $request->get('id_kecamatan', 'semua');
        $pasars = Pasar::all();
        $kecamatans = Kecamatan::all();
        $currentMonth = Carbon::now()->format('m');
        $currentMonthName = Carbon::now()->format('F Y');
        $currentYear = Carbon::now()->format('Y');
        $dates = $this->getWeeklyDates($currentMonth);

    
        // Ambil nilai active_tab dari request
        $activeTab = $request->get('active_tab', 'tab-pasar');
    
        if ($idKecamatan === 'semua') {
            // Ambil data rata-rata harga produsen untuk semua kecamatan
            $dataKecamatan = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
                ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
                ->select('produk.id_produk', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'users.id_kecamatan')
                ->where('harga_produk.tipe_harga', 'produsen')
                ->where(function($query) {
                    $query->where('produk.target', 'Produsen')
                        ->orWhere('produk.target', 'Keduanya');
                })
                ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_kecamatan')
                ->get()
                ->groupBy('komoditi');
    
            return [
                'dataKecamatan' => $dataKecamatan,
                'pasars' => $pasars,
                'kecamatans' => $kecamatans,
                'currentMonthName' => $currentMonthName,
                'dates' => $dates,
                'active_tab' => $activeTab
            ];
        } else {
            $dataDetailProdusen = HargaProduk::leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
            ->leftJoin('produk', 'harga_produk.id_produk', '=', 'produk.id_produk')
            ->where('users.id_kecamatan', $idKecamatan)
            ->whereYear('harga_produk.tgl_entry', $currentYear)
            ->where('harga_produk.tipe_harga', 'produsen')
            ->select('harga_produk.*', 'produk.nama_produk')
            ->get()
            ->groupBy('produk.id_produk');
    
            return [
                'dataDetailProdusen' => $dataDetailProdusen,
                'pasars' => $pasars,
                'kecamatans' => $kecamatans,
                'currentMonthName' => $currentMonthName,
                'dates' => $dates,
                'active_tab' => $activeTab
            ];
        }
    }

    public function handleData(Request $request)
    {
        // Mengambil data dari permintaan
        $idPasar = $request->get('id_pasar', 'semua');
        $idKecamatan = $request->get('id_kecamatan', 'semua');
        $activeTab = $request->get('active_tab', 'tab-pasar');

        // Memanggil metode privat untuk mengolah data
        $data = $this->getDataPasar($request);

        // Mengarahkan kembali dengan query string
        return redirect()->route('admin-dashboard.data-harga', [
            'id_pasar' => $idPasar,
            'id_kecamatan' => $idKecamatan,
            'active_tab' => $activeTab
        ]);
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
            'tgl_entry' => 'required'
        ]);
    
        // $today = Carbon::now();
    
        // // Menentukan tanggal entry terdekat pada hari Senin atau Kamis dalam minggu yang sama
        // if ($today->isMonday()) {
        //     $tglEntry = $today;
        // } elseif ($today->isThursday()) {
        //     $tglEntry = $today;
        // } elseif ($today->isBefore($today->copy()->startOfWeek()->addDays(4))) {
        //     // Jika hari ini sebelum hari Kamis minggu ini
        //     $tglEntry = $today->copy()->startOfWeek()->addDays(4); // Kamis minggu ini
        // } else {
        //     // Jika hari ini setelah hari Kamis minggu ini
        //     $tglEntry = $today->copy()->startOfWeek()->addDays(7); // Senin minggu depan
        // }
        // $tglEntry = $tglEntry->format('Y-m-d');
    
        // Menentukan tanggal pelaporan
        $tglLaporan = Carbon::now()->format('Y-m-d');
    
        $data = $request->input('data', []);
        foreach ($data as $item) {
            DB::table('harga_produk')->insert([
                'id_user' => $request->input('id_user'),
                'id_produk' => $item['id_produk'],
                'harga' => $item['harga'] ?? 0,
                'pasokan' => $item['pasokan'] ?? 0,
                'satuan_harga' => $item['satuan_harga'] ?? 'Kg',
                'satuan_pasokan' => $item['satuan_pasokan'] ?? 'Kg',
                'tgl_entry' => $request->input('tgl_entry'),
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
