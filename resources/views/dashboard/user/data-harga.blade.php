@extends('layouts.log-main')

@section('content')
<main class="container mt-4">
    @include('partials.log-navbar')

    <div class="container d-flex align-items-center justify-content-between mt-4">
        <h4>{{ $title }}</h4>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Harga</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow border-0 mt-4">
        <div class="card-body">

            <!-- Tabs and Data Section -->
            <div id="content-user">
                <!-- Button trigger modal -->
                <a href="{{ route('form_laporan') }}" class="btn btn-sm btn-primary rounded-pill pe-3 ps-3 mb-4 shadow">
                    Input Data<i class="bi bi-plus-circle ms-2"></i>
                </a>

                <!-- Conditionally Render Tabs Based on User Role -->
                @if($user->role == 'produsen')
                    <!-- For Produsen -->
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="produsen-tab" data-bs-toggle="tab" href="#data-produsen" role="tab" aria-controls="data-produsen" aria-selected="true">Produsen</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <!-- Data Produsen -->
                        <div class="tab-pane fade show active" id="data-produsen" role="tabpanel" aria-labelledby="produsen-tab">
                            <h4 class="text-center mt-4">Data Harga Pangan Tingkat Produsen</h4>
                            <h5 class="text-center mt-2">{{ $currentMonthName }}</h5>
                            <table class="table table-bordered table-hover mt-4">
                                <thead class="table-primary align-middle text-center">
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
                                    @foreach($dataProdusen as $produkId => $hargaEntries)
                                        <tr class="align-middle">
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td >{{ $hargaEntries->first()->nama_produk ?? '-' }}</td>
                                            @foreach ($dates as $week => $date)
                                                <td class="text-center">
                                                    @php
                                                        $hargaSenin = $hargaEntries->firstWhere('tgl_entry', $date['monday']);
                                                    @endphp
                                                    @if($hargaSenin)
                                                        <a href="#" class="text-decoration-none text-dark"  data-bs-toggle="modal" data-bs-target="#editModal" data-harga="{{ $hargaSenin->harga }}" data-id="{{ $hargaSenin->id_harga }}">
                                                            {{ $hargaSenin->harga }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @php
                                                        $hargaKamis = $hargaEntries->firstWhere('tgl_entry', $date['thursday']);
                                                    @endphp
                                                    @if($hargaKamis)
                                                        <a href="#" class="text-decoration-none text-dark"  data-bs-toggle="modal" data-bs-target="#editModal" data-harga="{{ $hargaKamis->harga }}" data-id="{{ $hargaKamis->id_harga }}">
                                                            {{ $hargaKamis->harga }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                @elseif($user->role == 'pedagang')
                    <!-- For Pengecer and Grosir -->
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
                            <table class="table table-bordered table-hover mt-4">
                                <thead class="table-primary align-middle text-center">
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
                                <tbody class="align-middle">
                                    @foreach($dataPengecer as $produkId => $hargaEntries)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $hargaEntries->first()->nama_produk ?? '-' }}</td>
                                            @foreach ($dates as $week => $date)
                                                <td class="text-center">
                                                    @php
                                                        $hargaSenin = $hargaEntries->firstWhere('tgl_entry', $date['monday']);
                                                    @endphp
                                                    @if($hargaSenin)
                                                        <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#editModal" data-harga="{{ $hargaSenin->harga }}" data-id="{{ $hargaSenin->id_harga }}">
                                                            {{ $hargaSenin->harga }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @php
                                                        $hargaKamis = $hargaEntries->firstWhere('tgl_entry', $date['thursday']);
                                                    @endphp
                                                    @if($hargaKamis)
                                                        <a href="#" class="text-decoration-none text-dark"  data-bs-toggle="modal" data-bs-target="#editModal" data-harga="{{ $hargaKamis->harga }}" data-id="{{ $hargaKamis->id_harga }}">
                                                            {{ $hargaKamis->harga }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
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
                            <table class="table table-bordered table-hover mt-4">
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
                                <tbody class="align-middle">
                                    @foreach($dataGrosir as $produkId => $hargaEntries)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $hargaEntries->first()->nama_produk ?? '-' }}</td>
                                            @foreach ($dates as $week => $date)
                                                <td class="text-center">
                                                    @php
                                                        $hargaSenin = $hargaEntries->firstWhere('tgl_entry', $date['monday']);
                                                    @endphp
                                                    @if($hargaSenin)
                                                        <a href="#" class="text-decoration-none text-dark"  data-bs-toggle="modal" data-bs-target="#editModal" data-harga="{{ $hargaSenin->harga }}" data-id="{{ $hargaSenin->id_harga }}">
                                                            {{ $hargaSenin->harga }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @php
                                                        $hargaKamis = $hargaEntries->firstWhere('tgl_entry', $date['thursday']);
                                                    @endphp
                                                    @if($hargaKamis)
                                                        <a href="#" class="text-decoration-none text-dark"  data-bs-toggle="modal" data-bs-target="#editModal" data-harga="{{ $hargaKamis->harga }}" data-id="{{ $hargaKamis->id_harga }}">
                                                            {{ $hargaKamis->harga }}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                @endif
            </div>

        </div>
    </div>
</main>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Harga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST" action="{{ route('update_harga_user') }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                        <input type="hidden" id="harga-id" name="id_harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var harga = button.getAttribute('data-harga');
            var id = button.getAttribute('data-id');

            var modalHargaInput = editModal.querySelector('#harga');
            var modalIdInput = editModal.querySelector('#harga-id');

            modalHargaInput.value = harga;
            modalIdInput.value = id;
        });
    });
</script>
@endsection
