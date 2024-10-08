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
            padding: 5px; 
        }
    
        th {
            background-color: #f2f2f2;
        }
    
        h4, h5 {
            text-align: center;
            margin: 10px 0; 
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
    <h4>DAFTAR HARGA PANGAN POKOK TINGKAT PRODUSEN <br>
        DI KABUPATEN LAMONGAN
        </h4>
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">KOMODITI</th>
                <th colspan="12">{{ $formattedHeaderDate }}</th>
            </tr>
            <tr>
                @foreach ($kecamatans as $kecamatan)
                    <th>{{ $kecamatan->nama_kecamatan }}</th>
                @endforeach
                <th>Harga Rata-rata (Kg)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRataProdusen as $komoditi => $rows)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td class="text-left">{{ $komoditi }}</td>
                    @foreach ($kecamatans as $kecamatan)
                        <td>
                            @php
                                $harga = $rows->where('id_kecamatan', $kecamatan->id_kecamatan)->pluck('harga_rata_rata')->first();
                                echo $harga ? number_format($harga) : '-';
                            @endphp
                        </td>
                    @endforeach
                    <td>{{ number_format($rows->avg('harga_rata_rata')) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-right date-footer">
        Lamongan, {{ $formattedFooterDate }}
    </p>
</body>
</html>
