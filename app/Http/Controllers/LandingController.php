<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pasar;
use App\Models\Produk;
use App\Models\Kecamatan;
use App\Models\HargaProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index() {
        $pasars = Pasar::all();
        $kecamatans = Kecamatan::all();
        $currentMonth = Carbon::now()->format('m');
        $currentMonthName = Carbon::now()->format('F Y');
        $currentYear = Carbon::now()->format('Y');
        $dates = $this->getWeeklyDates($currentMonth);
    
        // Fungsi untuk mendapatkan data berdasarkan tipe harga dan waktu tertentu
        $getData = function ($tipeHarga, $currentMonth, $currentYear) {
            $data = DB::table(DB::raw("(
                SELECT 
                    produk.id_produk, 
                    produk.nama_produk AS komoditi, 
                    produk.gambar,
                    MIN(harga_produk.harga) AS harga_terendah,
                    MAX(harga_produk.harga) AS harga_tertinggi
                FROM 
                    produk
                LEFT JOIN 
                    harga_produk ON produk.id_produk = harga_produk.id_produk
                LEFT JOIN 
                    users ON harga_produk.id_user = users.id
                WHERE 
                    harga_produk.tipe_harga = '$tipeHarga'
                    AND (produk.target = 'Pedagang' OR produk.target = 'Keduanya')
                    AND MONTH(harga_produk.tgl_entry) = $currentMonth
                    AND YEAR(harga_produk.tgl_entry) = $currentYear
                GROUP BY 
                    produk.id_produk, 
                    produk.nama_produk, 
                    produk.gambar
            ) AS Harga$tipeHarga"))
            ->select(
                'id_produk',
                'komoditi',
                'gambar',
                DB::raw('AVG(harga_terendah) AS harga_rata_rata_terendah'),
                DB::raw('AVG(harga_tertinggi) AS harga_rata_rata_tertinggi')
            )
            ->groupBy('id_produk', 'komoditi', 'gambar')
            ->get();
    
            // Jika data kosong, ambil data terbaru yang tersedia
            if ($data->isEmpty()) {
                $data = DB::table(DB::raw("(
                    SELECT 
                        produk.id_produk, 
                        produk.nama_produk AS komoditi, 
                        produk.gambar,
                        MIN(harga_produk.harga) AS harga_terendah,
                        MAX(harga_produk.harga) AS harga_tertinggi,
                        YEAR(harga_produk.tgl_entry) AS year,
                        MONTH(harga_produk.tgl_entry) AS month
                    FROM 
                        produk
                    LEFT JOIN 
                        harga_produk ON produk.id_produk = harga_produk.id_produk
                    LEFT JOIN 
                        users ON harga_produk.id_user = users.id
                    WHERE 
                        harga_produk.tipe_harga = '$tipeHarga'
                        AND (produk.target = 'Pedagang' OR produk.target = 'Keduanya')
                    GROUP BY 
                        produk.id_produk, 
                        produk.nama_produk, 
                        produk.gambar,
                        year,
                        month
                    ORDER BY 
                        year DESC, month DESC
                ) AS Harga$tipeHarga"))
                ->select(
                    'id_produk',
                    'komoditi',
                    'gambar',
                    DB::raw('AVG(harga_terendah) AS harga_rata_rata_terendah'),
                    DB::raw('AVG(harga_tertinggi) AS harga_rata_rata_tertinggi')
                )
                ->groupBy('id_produk', 'komoditi', 'gambar')
                ->get();
            }
    
            return $data;
        };
    
        $dataPengecer = $getData('pengecer', $currentMonth, $currentYear);
        $dataGrosir = $getData('grosir', $currentMonth, $currentYear);
        $dataProdusen = $getData('produsen', $currentMonth, $currentYear);
    
        return view('index', [
            'title' => 'Home Page', 
            'dataPengecer' => $dataPengecer,
            'dataGrosir' => $dataGrosir,
            'dataProdusen' => $dataProdusen,
            'pasars' => $pasars,
            'kecamatans' => $kecamatans,
            'currentMonthName' => $currentMonthName,
            'dates' => $dates
        ]);
    }
    
    
    public function data_harga(Request $request)
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

        return view('data-harga', [
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

    public function data_pasokan(Request $request)
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

        return view('data-pasokan', [
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
            'title' => 'Data Pasokan'
        ]);
    }

    public function download()
    {
        return view('download', ['title' => 'Download']);
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
                ->select('produk.id_produk', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'harga_produk.pasokan','users.id_pasar')
                ->where('harga_produk.tipe_harga', 'pengecer')
                ->where(function($query) {
                    $query->where('produk.target', 'Pedagang')
                        ->orWhere('produk.target', 'Keduanya');
                })
                ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_pasar', 'harga_produk.pasokan')
                ->get()
                ->groupBy('komoditi');

            

            // Rata-rata harga grosir
            $dataGrosir = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
                ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
                ->select('produk.id_produk', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'),'harga_produk.pasokan', 'users.id_pasar')
                ->where('harga_produk.tipe_harga', 'grosir')
                ->where(function($query) {
                    $query->where('produk.target', 'Pedagang')
                        ->orWhere('produk.target', 'Keduanya');
                })
                ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_pasar', 'harga_produk.pasokan')
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
                ->select('produk.id_produk', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'),'harga_produk.pasokan', 'users.id_kecamatan')
                ->where('harga_produk.tipe_harga', 'produsen')
                ->where(function($query) {
                    $query->where('produk.target', 'Produsen')
                        ->orWhere('produk.target', 'Keduanya');
                })
                ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_kecamatan', 'harga_produk.pasokan')
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

    public function handleData(Request $request)
    {
        // Mengambil data dari permintaan
        $idPasar = $request->get('id_pasar', 'semua');
        $idKecamatan = $request->get('id_kecamatan', 'semua');
        $activeTab = $request->get('active_tab', 'tab-pasar');
        $tipe = $request->input('tipe');

        if($tipe == 'harga'){
            // Mengarahkan kembali dengan query string
            return redirect()->route('data-harga', [
                'id_pasar' => $idPasar,
                'id_kecamatan' => $idKecamatan,
                'active_tab' => $activeTab
            ]);
        }else{
            return redirect()->route('data-pasokan', [
                'id_pasar' => $idPasar,
                'id_kecamatan' => $idKecamatan,
                'active_tab' => $activeTab
            ]);
        }
        
    }
}
