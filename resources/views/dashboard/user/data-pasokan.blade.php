@extends('layouts.log-main')

@section('content')
<main class="container mt-4">
    @include('partials.log-navbar')

    <div class="container d-flex align-items-center justify-content-between mt-4">
        <h4>{{ $title }}</h4>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pasokan</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow border-0 mt-4">
        <div class="card-body">

            <!-- Tabs and Data Section -->
            <div id="content-pedagang">
                <!-- Button trigger modal -->
                <a href="{{ route('form_laporan') }}" class="btn btn-sm btn-primary rounded-pill pe-3 ps-3 mb-4 shadow">
                    Input Data<i class="bi bi-plus-circle ms-2"></i>
                </a>

                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pengecer-tab" data-bs-toggle="tab" href="#data-pengecer" role="tab" aria-controls="data-pengecer" aria-selected="true">Pengecer</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="grosir-tab" data-bs-toggle="tab" href="#data-grosir" role="tab" aria-controls="data-grosir" aria-selected="false">Grosir</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- Data Pengecer -->
                    <div class="tab-pane fade show active" id="data-pengecer" role="tabpanel" aria-labelledby="pengecer-tab">
                        <h4 class="text-center mt-4">Data Harga Pangan Tingkat Pedagang Pengecer</h4>
                        <h5 class="text-center mt-2">{{ $currentMonthName }}</h5>
                        <table class="table table-bordered table-hover text-center mt-4">
                            <thead class="table-primary align-middle">
                                <tr>
                                    <th rowspan="3">NO</th>
                                    <th rowspan="3">KOMODITI</th>
                                    <th colspan="10">HARGA (Kg)</th>
                                </tr>
                                <tr>
                                    @foreach ($dates as $week => $date)
                                        <th colspan="2">Minggu {{ $week }} (Kg)</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($dates as $date)
                                        <th>Senin<br>{{ \Carbon\Carbon::parse($date['monday'])->format('d-m-Y') ?? '-' }}</th>
                                        <th>Kamis<br>{{ \Carbon\Carbon::parse($date['thursday'])->format('d-m-Y') ?? '-' }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataPengecer as $produkId => $pasokanEntries)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pasokanEntries->first()->nama_produk ?? '-' }}</td>
                                        @foreach ($dates as $week => $date)
                                            <td>
                                                @php
                                                    $hargaSenin = $pasokanEntries->firstWhere('tgl_entry', $date['monday']);
                                                @endphp
                                                {{ $hargaSenin ? $hargaSenin->pasokan : '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $hargaKamis = $pasokanEntries->firstWhere('tgl_entry', $date['thursday']);
                                                @endphp
                                                {{ $hargaKamis ? $hargaKamis->pasokan : '-' }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Data Grosir -->
                    <div class="tab-pane fade" id="data-grosir" role="tabpanel" aria-labelledby="grosir-tab">
                        <h4 class="text-center mt-4">Data Harga Pangan Tingkat Pedagang Grosir</h4>
                        <h5 class="text-center mt-2">{{ $currentMonthName }}</h5>
                        <table class="table table-bordered table-hover text-center mt-4">
                            <thead class="table-primary align-middle">
                                <tr>
                                    <th rowspan="3">NO</th>
                                    <th rowspan="3">KOMODITI</th>
                                    <th colspan="10">HARGA (Kg)</th>
                                </tr>
                                <tr>
                                    @foreach ($dates as $week => $date)
                                        <th colspan="2">Minggu {{ $week }} (Kg)</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($dates as $date)
                                        <th>Senin<br>{{ \Carbon\Carbon::parse($date['monday'])->format('d-m-Y') ?? '-' }}</th>
                                        <th>Kamis<br>{{ \Carbon\Carbon::parse($date['thursday'])->format('d-m-Y') ?? '-' }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataGrosir as $produkId => $pasokanEntries)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pasokanEntries->first()->nama_produk ?? '-' }}</td>
                                        @foreach ($dates as $week => $date)
                                            <td>
                                                @php
                                                    $hargaSenin = $pasokanEntries->firstWhere('tgl_entry', $date['monday']);
                                                @endphp
                                                {{ $hargaSenin ? $hargaSenin->pasokan : '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $hargaKamis = $pasokanEntries->firstWhere('tgl_entry', $date['thursday']);
                                                @endphp
                                                {{ $hargaKamis ? $hargaKamis->pasokan : '-' }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</main>
@endsection
