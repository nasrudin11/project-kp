<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <style>
        @page {
            margin: 20mm;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h4, h5 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-top: 20px; 
            margin-bottom: 20px; /* Optional: Add bottom margin for spacing */
            text-align: right;
        }
        .page-break {
            page-break-before: always;
        }
        .text-left{
            text-align: left;
        }

        .text-right {
        text-align: right;
        }

        .date-footer {
            margin-top: 20px; /* Atur jarak antara tabel dan footer jika diperlukan */
        }

    </style>
</head>
<body>
    <h4>DAFTAR HARGA KOMODITAS PANGAN TINGKAT PRODUSEN <br>
        DI KABUPATEN LAMONGAN
        </h4>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">KOMODITI</th>
                    <th colspan="3">Harga Rata-Rata (Rp/Kg)</th>
                </tr>
                <tr>
                    @foreach ($dates as $date)
                        <th>{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($dataRataProdusen as $komoditi => $rows)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $komoditi }}</td>
                        @foreach ($dates as $date)
                            <td>
                                @php
                                    // Mengambil data yang sesuai dengan tgl_entry
                                    $rowForDate = $rows->firstWhere('tgl_entry', $date);
                                    $hargaRataRata = $rowForDate ? $rowForDate->harga_rata_rata : null;
                                @endphp
                                {{ $hargaRataRata ? number_format($hargaRataRata, 0, ',', '.') : '-' }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
    
            </tbody>
        </table>

    <p class="text-right date-footer">
        Lamongan, {{ $formattedFooterDate }}
    </p>



</body>
</html>
