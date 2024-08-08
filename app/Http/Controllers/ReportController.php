<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pasar;
use App\Models\Kecamatan;
use App\Models\HargaProduk;
use iio\libmergepdf\Merger;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\Produk; // Ganti dengan model yang sesuai

class ReportController extends Controller
{

    public function generatePdf(){
        $pasars = Pasar::all();
        $kecamatans = Kecamatan::all();
        $currentMonth = Carbon::now()->format('m');
        $currentMonthName = Carbon::now()->format('F Y');
        $dates = $this->getWeeklyDates($currentMonth);

        $dataRataPengecer = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
            ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
            ->select('produk.id_produk', 'produk.gambar', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'harga_produk.pasokan','users.id_pasar')
            ->where('harga_produk.tipe_harga', 'pengecer')
            ->where(function($query) {
                $query->where('produk.target', 'Pedagang')
                    ->orWhere('produk.target', 'Keduanya');
            })
            ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_pasar', 'harga_produk.pasokan', 'produk.gambar')
            ->get()
            ->groupBy('komoditi');

      
    
        $dataRataGrosir = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
            ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
            ->select('produk.id_produk','produk.gambar', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'harga_produk.pasokan','users.id_pasar')
            ->where('harga_produk.tipe_harga', 'grosir')
            ->where(function($query) {
                $query->where('produk.target', 'Pedagang')
                    ->orWhere('produk.target', 'Keduanya');
            })
            ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_pasar', 'harga_produk.pasokan','produk.gambar')
            ->get()
            ->groupBy('komoditi');



        $dataRataProdusen = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
            ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
            ->select('produk.id_produk','produk.gambar', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'harga_produk.pasokan','users.id_kecamatan')
            ->where('harga_produk.tipe_harga', 'produsen')
            ->where(function($query) {
                $query->where('produk.target', 'Produsen')
                    ->orWhere('produk.target', 'Keduanya');
            })
            ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_kecamatan', 'harga_produk.pasokan','produk.gambar')
            ->get()
            ->groupBy('komoditi');

        

        $m = new Merger();

        // dd($dataRataPengecer);
        // Pengecer
        $pdf_pe = Pdf::loadView('pdf.pengecer_harga_ratarata', compact('dataRataPengecer',  'dates', 'currentMonthName', 'pasars'))
                     ->setPaper('a3', 'potrait');

        $m->addRaw($pdf_pe->output());

        $pdf_pe2 = Pdf::loadView('pdf.pengecer_harga_pasokan', compact('dataRataPengecer',  'dates', 'currentMonthName', 'pasars'))
                    ->setPaper('a3', 'landscape');

        $m->addRaw($pdf_pe2->output());


        // Grosir

        $pdf_gr = Pdf::loadView('pdf.grosir_harga_ratarata', compact('dataRataGrosir', 'dates', 'currentMonthName', 'pasars'))
        ->setPaper('a3', 'potrait');

        $m->addRaw($pdf_gr->output());

        $pdf_gr2 = Pdf::loadView('pdf.grosir_harga_pasokan', compact('dataRataGrosir', 'dates', 'currentMonthName', 'pasars'))
            ->setPaper('a3', 'landscape');

        $m->addRaw($pdf_gr2->output());

        // Produsen
        $pdf_pr = Pdf::loadView('pdf.produsen_harga_ratarata', compact('dataRataProdusen', 'dates', 'currentMonthName','kecamatans'))
        ->setPaper('a3', 'potrait');

        $m->addRaw($pdf_pr->output());

        $pdf_pr2 = Pdf::loadView('pdf.produsen_harga', compact('dataRataProdusen', 'dates', 'currentMonthName', 'kecamatans'))
            ->setPaper('a3', 'landscape');

        $m->addRaw($pdf_pr2->output());


        $nama_file = 'file_name.pdf';

        return response($m->merge())
                ->withHeaders([
                    'Content-Type' => 'application/pdf',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.$nama_file,
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
  
}

