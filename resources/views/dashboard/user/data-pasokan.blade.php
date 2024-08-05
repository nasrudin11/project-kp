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
                                                     $pasokanSenin = $pasokanEntries->firstWhere('tgl_entry', $date['monday']);
                                                @endphp
                                                @if($pasokanSenin)
                                                    <a href="#" class="text-decoration-none text-dark"  data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $pasokanSenin->pasokan }}" data-id="{{ $pasokanSenin->id_harga }}">
                                                        {{ $pasokanSenin->pasokan }}
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                     $pasokanKamis = $pasokanEntries->firstWhere('tgl_entry', $date['thursday']);
                                                @endphp
                                                @if($pasokanKamis)
                                                    <a href="#" class="text-decoration-none text-dark"  data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $pasokanKamis->pasokan }}" data-id="{{ $pasokanKamis->id_harga }}">
                                                        {{ $pasokanKamis->pasokan }}
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
                                                     $pasokanSenin = $pasokanEntries->firstWhere('tgl_entry', $date['monday']);
                                                @endphp
                                                @if($pasokanSenin)
                                                    <a href="#" class="text-decoration-none text-dark"  data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $pasokanSenin->pasokan }}" data-id="{{ $pasokanSenin->id_harga }}">
                                                        {{ $pasokanSenin->pasokan }}
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                     $pasokanKamis = $pasokanEntries->firstWhere('tgl_entry', $date['thursday']);
                                                @endphp
                                                @if($pasokanKamis)
                                                    <a href="#" class="text-decoration-none text-dark"  data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $pasokanKamis->pasokan }}" data-id="{{ $pasokanKamis->id_harga }}">
                                                        {{ $pasokanKamis->pasokan }}
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
            <form id="editForm" method="POST" action="{{ route('update_pasokan_user') }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pasokan" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="pasokan" name="pasokan" required>
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
            var pasokan = button.getAttribute('data-pasokan');
            var id = button.getAttribute('data-id');

            var modalPasokanInput = editModal.querySelector('#pasokan');
            var modalIdInput = editModal.querySelector('#harga-id');

            modalPasokanInput.value = pasokan;
            modalIdInput.value = id;
        });
    });
</script>
@endsection
