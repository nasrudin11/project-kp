<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <style>
        @page {
            margin: 20mm;
        }

        body {
            font-size: 14px;
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
            padding: 5px; /* Tambahkan padding untuk meningkatkan keterbacaan */
        }

        th {
            background-color: #f2f2f2;
        }

        h4, h5 {
            text-align: center;
            margin-bottom: 10px; /* Kurangi margin untuk memanfaatkan ruang vertikal */
        }

        p {
            margin-top: 20px; 
            margin-bottom: 20px; 
            text-align: right;
        }

        .page-break {
            page-break-before: always;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .date-footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h4>DAFTAR HARGA PANGAN POKOK TINGKAT PEDAGANG PENGECER PASAR <br>
        DI KABUPATEN LAMONGAN
    </h4>
    
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">KOMODITI</th>
                <th colspan="{{ count($pasars) }}">{{ $formattedHeaderDate }}</th>
                <th rowspan="2">Harga Rata-rata (Rp/Kg)</th>
            </tr>
            <tr>
                @foreach ($pasars as $pasar)
                    <th>{{ $pasar->nama_pasar }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRataPengecer as $komoditi => $rows)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $komoditi }}</td>
                    @foreach ($pasars as $pasar)
                        <td>
                            @php
                                $harga = $rows->where('id_pasar', $pasar->id_pasar)->pluck('harga_rata_rata')->first();
                            @endphp
                            {{ $harga ? number_format($harga, 0, ',', '.') : '-' }}
                        </td>
                    @endforeach
                    <td>{{ number_format($rows->avg('harga_rata_rata'), 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-right date-footer">
        Lamongan, {{ $formattedFooterDate }}
    </p>
    
    <!-- Pemisah Halaman -->
    <div class="page-break"></div>
    
    <h4>DAFTAR PASOKAN PANGAN POKOK TINGKAT PENGECEK GROSIR PASAR <br>
        DI KABUPATEN LAMONGAN
    </h4>
    
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">KOMODITI</th>
                <th colspan="{{ count($pasars) }}">{{ $formattedHeaderDate }}</th>
            </tr>
            <tr>
                @foreach ($pasars as $pasar)
                    <th>{{ $pasar->nama_pasar }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRataPengecer as $komoditi => $rows)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $komoditi }}</td>
                    @foreach ($pasars as $pasar)
                        <td>
                            @php
                                $pasokan = $rows->where('id_pasar', $pasar->id_pasar)->first();
                            @endphp
                            {{ $pasokan ? $pasokan->pasokan : '-' }}
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
