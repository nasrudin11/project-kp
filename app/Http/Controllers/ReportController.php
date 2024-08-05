<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produk; // Ganti dengan model yang sesuai

class ReportController extends Controller
{
    public function generatePdf()
    {
        // Ambil data dari database
        $data = Produk::all(); // Ganti dengan query yang sesuai

        // Generate PDF
        $pdf = Pdf::loadView('pdf_table', compact('data'));

        // Download PDF
        return $pdf->download('data_table_report.pdf');
    }
}

