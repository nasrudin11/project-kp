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

    </style>
</head>
<body>
    <h4>DAFTAR HARGA TINGKAT PEDAGANG PENGECER PASAR <br>
        DI KABUPATEN LAMONGAN
        </h4>
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">KOMODITI</th>
                <th colspan="10">Kamis, 5 Agustus 2024</th>
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



</body>
</html>
