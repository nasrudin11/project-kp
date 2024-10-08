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
    <h4>DAFTAR HARGA PANGAN POKOK TINGKAT PEDAGANG GROSIR PASAR <br>
        DI KABUPATEN LAMONGAN
    </h4>
    
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">KOMODITI</th>
                <th colspan="10">{{ $formattedHeaderDate }}</th>
            </tr>
            <tr>
                @foreach ($pasars as $pasar)
                    <th>{{ $pasar->nama_pasar }}</th>
                @endforeach
                <th>Harga Rata-rata (Kg)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRataGrosir as $komoditi => $rows)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td class="text-left">{{ $komoditi }}</td>
                    @foreach ($pasars as $pasar)
                        <td>
                            @php
                                $harga = $rows->where('id_pasar', $pasar->id_pasar)->pluck('harga_rata_rata')->first();
                                echo $harga ? number_format($harga) : '-';
                            @endphp
                        </td>
                    @endforeach
                    <td>{{ number_format($rows->avg('harga_rata_rata')) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pemisah Halaman -->
    <div class="page-break"></div>

    <h4>DAFTAR PASOKAN PANGAN POKOK TINGKAT PEDAGANG GROSIR PASAR <br>
        DI KABUPATEN LAMONGAN</h4>
    
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">KOMODITI</th>
                <th colspan="9">{{ $formattedHeaderDate }}</th>
            </tr>
            <tr>
                @foreach ($pasars as $pasar)
                    <th>{{ $pasar->nama_pasar }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRataGrosir as $komoditi => $rows)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $komoditi }}</td>
                    @foreach ($pasars as $pasar)
                        <td>
                            @php
                                $pasokan = $rows->where('id_pasar', $pasar->id_pasar)->first();
                            @endphp

                            @if($pasokan)
                                {{ $pasokan->pasokan }}
                            @else
                                -
                            @endif
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
