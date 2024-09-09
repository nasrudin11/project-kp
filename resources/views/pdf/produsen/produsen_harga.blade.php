<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Gaya tambahan untuk menyesuaikan tampilan PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .mt-4 {
            margin-top: 1.5rem;
        }
        .mt-2 {
            margin-top: 0.5rem;
        }

        .page-break {
            page-break-before: always;
        }

    </style>
</head>
<body>
    @php
        $firstItem = $dataDetailProdusen->first();
        $namaKecamatan =  $firstItem->first()->nama_kecamatan;
    @endphp

    <h4 class="text-center">
        DAFTAR HARGA TINGKAT PRODUSEN <br>
        KECAMATAN {{ strtoupper($namaKecamatan) }} KABUPATEN LAMONGAN
    </h4>
    <h5 class="text-center">{{ $formattedHeaderDate }}</h5>
    
    <!-- Tabel Data Pedagang -->
    <table style="font-size: 14px">
        <thead class="text-center">
            <tr>
                <th rowspan="3">NO</th>
                <th rowspan="3">KOMODITI</th>
                <th colspan="{{ count($allDates) * 2 }}">HARGA (Kg)</th>
            </tr>
            <tr>
                @foreach ($allDates as $week => $date)
                    <th colspan="2">Minggu {{ $week + 1 }} (Kg)</th>
                @endforeach
            </tr>
            <tr>
                @foreach ($allDates as $date)
                    <th>Senin<br>{{ \Carbon\Carbon::parse($date['monday'])->format('d-m-Y') }}</th>
                    <th>Kamis<br>{{ \Carbon\Carbon::parse($date['thursday'])->format('d-m-Y') }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($dataDetailProdusen as $produkId => $hargaEntries)
                <tr>
                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $hargaEntries->first()->nama_produk ?? '-' }}</td>
                    @foreach ($allDates as $date)
                        <td class="text-center">
                            @php
                                $hargaSenin = $hargaEntries->firstWhere('tgl_entry', $date['monday']);
                            @endphp
                            @if($hargaSenin)
                                {{ $hargaSenin->harga }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
                            @php
                                $hargaKamis = $hargaEntries->firstWhere('tgl_entry', $date['thursday']);
                            @endphp
                            @if($hargaKamis)
                                {{ $hargaKamis->harga }}
                            @else
                                -
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pemisah Halaman -->
    <div class="page-break"></div>

    <h4 class="text-center">DAFTAR PASOKAN TINGKAT PRODUSEN <br> 
        KECAMATAN {{ strtoupper($namaKecamatan) }} KABUPATEN LAMONGAN
    </h4>
    <h5 class="text-center">{{ $formattedHeaderDate }}</h5>
    
    <!-- Tabel Data Pedagang -->
    <table style="font-size: 14px">
        <thead class="text-center">
            <tr>
                <th rowspan="3">NO</th>
                <th rowspan="3">KOMODITI</th>
                <th colspan="{{ count($allDates) * 2 }}">PASOKAN (Kg)</th>
            </tr>
            <tr>
                @foreach ($allDates as $week => $date)
                    <th colspan="2">Minggu {{ $week + 1 }} (Kg)</th>
                @endforeach
            </tr>
            <tr>
                @foreach ($allDates as $date)
                    <th>Senin<br>{{ \Carbon\Carbon::parse($date['monday'])->format('d-m-Y') }}</th>
                    <th>Kamis<br>{{ \Carbon\Carbon::parse($date['thursday'])->format('d-m-Y') }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($dataDetailProdusen as $produkId => $pasokanEntries)
                <tr>
                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $pasokanEntries->first()->nama_produk ?? '-' }}</td>
                    @foreach ($allDates as $date)
                        <td class="text-center">
                            @php
                                $pasokanSenin = $pasokanEntries->firstWhere('tgl_entry', $date['monday']);
                            @endphp
                            @if($pasokanSenin)
                                {{ $pasokanSenin->pasokan }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
                            @php
                                $pasokanKamis = $pasokanEntries->firstWhere('tgl_entry', $date['thursday']);
                            @endphp
                            @if($pasokanKamis)
                                {{ $pasokanKamis->pasokan }}
                            @else
                                -
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</html>
