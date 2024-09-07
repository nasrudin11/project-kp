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
use App\Models\Produk; 
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

    public function generatePdf(Request $request){
        Carbon::setLocale('id');

        $pasars = Pasar::all();
        $kecamatans = Kecamatan::all();
        // $currentMonth = Carbon::now()->format('m');
        $currentMonthName = Carbon::now()->format('F Y');

        $selectedDate = $request->input('tanggal');

        $selectedMonth = Carbon::parse($selectedDate)->format('m');
        $selectedYear = Carbon::parse($selectedDate)->format('Y');

        // Format untuk header tabel
        $formattedHeaderDate = Carbon::parse($selectedDate)->translatedFormat('l, j F Y');
        
        // Format untuk footer tanggal
        $formattedFooterDate = Carbon::parse($selectedDate)->translatedFormat('d F Y');

        $allDates = $this->getWeeklyDates($selectedMonth, $selectedYear);

        // Filter tanggal-tanggal yang ada sebelum tanggal yang dipilih
        $dates = [];
        foreach (array_reverse($allDates) as $week) {
            if ($week['monday'] <= $selectedDate) {
                $dates[] = $week['monday'];
            }
            if ($week['thursday'] <= $selectedDate) {
                $dates[] = $week['thursday'];
            }
            if (count($dates) >= 3) break;
        }

        sort($dates);

        $chartImageFilename = $this->generateChartImage($dates);
    

        $dataMinmaxPengecer = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
            ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
            ->select(
                'produk.id_produk',
                'produk.gambar',
                'produk.nama_produk as komoditi',
                DB::raw('MIN(harga_produk.harga) as harga_terendah'),
                DB::raw('MAX(harga_produk.harga) as harga_tertinggi'),
                DB::raw('GROUP_CONCAT(DISTINCT DATE(harga_produk.tgl_entry) ORDER BY harga_produk.tgl_entry ASC SEPARATOR ", ") as rentang_tanggal')
            )
            ->where('harga_produk.tipe_harga', 'pengecer')
            ->whereIn(DB::raw('DATE(harga_produk.tgl_entry)'), $dates)
            ->where(function($query) {
                $query->where('produk.target', 'Pedagang')
                    ->orWhere('produk.target', 'Keduanya');
            })
            ->groupBy('produk.id_produk', 'produk.nama_produk', 'produk.gambar')
            ->get()
            ->map(function ($item) use ($dates) {
                // Menghitung rata-rata harga untuk setiap tanggal yang dipilih
                $avgPrices = [];
                foreach ($dates as $date) {
                    $avgPrice = HargaProduk::where('id_produk', $item->id_produk)
                        ->whereDate('tgl_entry', $date)
                        ->where('tipe_harga', 'pengecer')
                        ->avg('harga');
                    $avgPrices[$date] = $avgPrice ?? 0;
                }

                // Menghitung perubahan harga berdasarkan rata-rata
                $item->perubahan_harga = end($avgPrices) - reset($avgPrices);
                $item->status_perubahan = 'Stabil';
                $item->perubahan_persen = '0%';

                if (reset($avgPrices) > 0) {
                    if ($item->perubahan_harga > 0) {
                        $item->status_perubahan = 'Naik';
                        $item->perubahan_persen = round(($item->perubahan_harga / reset($avgPrices)) * 100, 2) . '%';
                    } elseif ($item->perubahan_harga < 0) {
                        $item->status_perubahan = 'Turun';
                        $item->perubahan_persen = round((abs($item->perubahan_harga) / reset($avgPrices)) * 100, 2) . '%';
                    }
                } else {
                    $item->status_perubahan = 'Tidak Tersedia';
                    $item->perubahan_persen = 'N/A';
                }

                return $item;
            });

        $keterangan = $this->generateDescription($dataMinmaxPengecer);


        $dataRataPengecer = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
            ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
            ->select('produk.id_produk', 'produk.gambar', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'produk.nama_produk as komoditi', 'harga_produk.pasokan', 
                'harga_produk.harga', 'users.id_pasar', 'harga_produk.tgl_entry'
            )
            ->where('harga_produk.tipe_harga', 'pengecer')
            ->whereIn(DB::raw('DATE(harga_produk.tgl_entry)'), $dates)
            ->where(function($query) {
                $query->where('produk.target', 'Pedagang')
                    ->orWhere('produk.target', 'Keduanya');
            })
            ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_pasar', 'harga_produk.harga', 
                'harga_produk.pasokan', 'produk.gambar', 'harga_produk.tgl_entry')
            ->get()
            ->groupBy('komoditi');
    
        $dataRataGrosir = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
            ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
            ->select('produk.id_produk','produk.gambar', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'harga_produk.pasokan','users.id_pasar', 'harga_produk.tgl_entry')
            ->where('harga_produk.tipe_harga', 'grosir')
            ->whereIn(DB::raw('DATE(harga_produk.tgl_entry)'), $dates)
            ->where(function($query) {
                $query->where('produk.target', 'Pedagang')
                    ->orWhere('produk.target', 'Keduanya');
            })
            ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_pasar', 'harga_produk.pasokan','produk.gambar', 'harga_produk.tgl_entry')
            ->get()
            ->groupBy('komoditi');


        $dataRataProdusen = Produk::leftJoin('harga_produk', 'produk.id_produk', '=', 'harga_produk.id_produk')
            ->leftJoin('users', 'harga_produk.id_user', '=', 'users.id')
            ->select('produk.id_produk','produk.gambar', 'produk.nama_produk as komoditi', DB::raw('AVG(harga_produk.harga) as harga_rata_rata'), 'harga_produk.pasokan','users.id_kecamatan', 'harga_produk.tgl_entry')
            ->where('harga_produk.tipe_harga', 'produsen')
            ->whereIn(DB::raw('DATE(harga_produk.tgl_entry)'), $dates)
            ->where(function($query) {
                $query->where('produk.target', 'Produsen')
                    ->orWhere('produk.target', 'Keduanya');
            })
            ->groupBy('produk.id_produk', 'produk.nama_produk', 'users.id_kecamatan', 'harga_produk.pasokan','produk.gambar', 'harga_produk.tgl_entry')
            ->get()
            ->groupBy('komoditi');

        

        $m = new Merger();

        // dd($dataRataPengecer);
        $pdf_gambar = Pdf::loadView('pdf.gambar_harga_produk', compact('dataMinmaxPengecer', 'selectedDate', 'dates', 'currentMonthName', 'pasars', 'formattedHeaderDate', 'keterangan'))
                        ->setPaper('a3', 'landscape');

        $m->addRaw($pdf_gambar->output());

        $pdf_chart = Pdf::loadView('pdf.chart', compact('chartImageFilename', 'formattedHeaderDate', 'formattedFooterDate'))
                    ->setPaper('a3', 'potrait');

        $m->addRaw($pdf_chart->output());

        $pdf_ket = Pdf::loadView('pdf.keterangan', compact('keterangan'))
                    ->setPaper('a3', 'potrait');

        $m->addRaw($pdf_ket->output());


        // Pengecer
        $pdf_pe = Pdf::loadView('pdf.pengecer_harga_ratarata', compact('dataRataPengecer', 'selectedDate', 'dates', 'currentMonthName', 'pasars', 'formattedHeaderDate','formattedFooterDate'))
                     ->setPaper('a3', 'potrait');

        $m->addRaw($pdf_pe->output());

        $pdf_pe2 = Pdf::loadView('pdf.pengecer_harga_pasokan', compact('dataRataPengecer',  'dates', 'currentMonthName', 'pasars', 'formattedHeaderDate', 'formattedFooterDate'))
                    ->setPaper('a3', 'landscape');

        $m->addRaw($pdf_pe2->output());


        // Grosir

        $pdf_gr = Pdf::loadView('pdf.grosir_harga_ratarata', compact('dataRataGrosir', 'selectedDate', 'dates', 'currentMonthName', 'pasars', 'formattedHeaderDate','formattedFooterDate'))
        ->setPaper('a3', 'potrait');

        $m->addRaw($pdf_gr->output());

        $pdf_gr2 = Pdf::loadView('pdf.grosir_harga_pasokan', compact('dataRataGrosir', 'dates', 'currentMonthName', 'pasars', 'formattedHeaderDate', 'formattedFooterDate'))
            ->setPaper('a3', 'landscape');

        $m->addRaw($pdf_gr2->output());

        // Produsen
        $pdf_pr = Pdf::loadView('pdf.produsen_harga_ratarata', compact('dataRataProdusen', 'selectedDate', 'dates', 'currentMonthName','kecamatans', 'formattedHeaderDate', 'formattedFooterDate'))
        ->setPaper('a3', 'potrait');

        $m->addRaw($pdf_pr->output());

        $pdf_pr2 = Pdf::loadView('pdf.produsen_harga', compact('dataRataProdusen', 'dates', 'currentMonthName', 'kecamatans', 'formattedHeaderDate', 'formattedFooterDate'))
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

    
    private function getWeeklyDates($month, $year)
    {
        $dates = [];
        $startOfMonth = Carbon::create($year, $month, 1);
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        for ($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addWeek()) {
            $dates[] = [
                'monday' => $date->startOfWeek()->format('Y-m-d'),
                'thursday' => $date->startOfWeek()->addDays(3)->format('Y-m-d')
            ];
        }

        return $dates;
    }

    private function generateDescription($data)
    {
        return $data->map(function ($item) {
            $keterangan = "Harga rata-rata {$item->komoditi} di Kabupaten Lamongan selama seminggu ini ";
    
            // Mengambil rata-rata harga dari tanggal-tanggal yang dipilih
            $dates = explode(', ', $item->rentang_tanggal);
            $hargaAwal = HargaProduk::where('id_produk', $item->id_produk)
                ->whereDate('tgl_entry', $dates[0])
                ->where('tipe_harga', 'pengecer')
                ->avg('harga');
            
            $hargaAkhir = HargaProduk::where('id_produk', $item->id_produk)
                ->whereDate('tgl_entry', end($dates))
                ->where('tipe_harga', 'pengecer')
                ->avg('harga');
            
            $selisih = $hargaAkhir - $hargaAwal;
            $persentase = ($hargaAwal > 0) ? round(($selisih / $hargaAwal) * 100, 2) : 0;
    
            if ($selisih > 0) {
                $keterangan .= "naik sebesar Rp " . number_format(abs($selisih), 0, ',', '.') . " (naik " . $persentase . "%).";
            } elseif ($selisih < 0) {
                $keterangan .= "turun sebesar Rp " . number_format(abs($selisih), 0, ',', '.') . " (turun " . $persentase . "%).";
            } else {
                $keterangan .= "stabil di harga Rp " . number_format($hargaAkhir, 0, ',', '.') . ".";
            }
    
            return $keterangan;
        });
    }

    private function prepareChartData($dates) {
        $data = [];
        
        // Fetch product prices for "pengecer" type based on dates
        $hargaProduk = HargaProduk::where('tipe_harga', 'pengecer')
            ->whereIn('tgl_entry', $dates)
            ->get();
    
        // Process data for chart
        foreach ($hargaProduk as $harga) {
            $data[$harga->produk->nama_produk][$harga->tgl_entry] = (int)$harga->harga;
        }
    
        $chartData = [];
        foreach ($data as $product => $prices) {
            $productData = [];
            foreach ($dates as $date) {
                $productData[] = $prices[$date] ?? 0;
            }
            $chartData[] = [
                'name' => $product,
                'data' => $productData
            ];
        }
    
        return $chartData;
    }  

    private function generateChartImage($dates) {
        $chartData = $this->prepareChartData($dates);
        
        // Format dates for Highcharts
        $datesFormatted = array_map(function($date) {
            return Carbon::parse($date)->format('d M');
        }, $dates);
    
        $response = Http::post('https://export.highcharts.com/', [
            'infile' => [
                'title' => ['text' => 'Grafik Harga Produk Pengecer'],
                'xAxis' => ['categories' => $datesFormatted],
                'yAxis' => ['title' => ['text' => 'Harga (Rp)']],
                'series' => $chartData,
            ],
            'type' => 'png',
            'scale' => 2,
            'constr' => 'Chart',
        ]);
    
        $filename = 'grafik_harga_produk_pengecer.png';
        Storage::put('public/images/' . $filename, $response->body());
    
        return $filename;
    }
    
    
}
