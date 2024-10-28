@extends('layouts.log-main')

@section('content')
<main class="container mt-3">
    @include('partials.log-navbar')

    <div class="container d-flex align-items-center justify-content-between mt-4">
        <h4>Input Data Harga dan Pasokan</h4>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin-dashboard/data-harga">Data Harga</a> - <a href="/admin-dashboard/data-pasokan">Data Pasokan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Input Data</li>
            </ol>
        </nav>
    </div>

        <!-- Pesan Sukses -->
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Menampilkan pesan kesalahan atau sukses -->
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow border-0 mt-4">
        <div class="card-body">

            @if($tipe == 'pedagang')
                <ul class="nav nav-tabs" id="inputTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pengecer-tab" data-bs-toggle="tab" href="#pengecer" role="tab" aria-controls="pengecer" aria-selected="true">Harga Tipe Pengecer</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="grosir-tab" data-bs-toggle="tab" href="#grosir" role="tab" aria-controls="grosir" aria-selected="false">Harga Tipe Grosir</a>
                    </li>
                </ul>
            @elseif($tipe == 'produsen')
                <ul class="nav nav-tabs" id="inputTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="produsen-tab" data-bs-toggle="tab" href="#produsen" role="tab" aria-controls="produsen" aria-selected="true">Harga Tipe Produsen</a>
                    </li>
                </ul>
            @endif

            <div class="tab-content" id="inputTabContent">

                <!-- Tabel Form Pengecer -->
                @if($tipe == 'pedagang')
                    <div class="tab-pane fade show active" id="pengecer" role="tabpanel" aria-labelledby="pengecer-tab">
                        <form action="{{ route('laporan.store') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="tipe_harga" value="pengecer">

                            <div class="d-flex">
                                <div class="mt-3 me-4">
                                    <label for="" class="form-label">Tanggal Entry</label>
                                    <input type="date" name="tgl_entry" id="tgl_entry" class="form-control w-auto @error('tgl_entry', 'pengecer') is-invalid @enderror" value="{{ old('tgl_entry', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                    
                                    @error('tgl_entry', 'pengecer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <label for="select-pasar" class="form-label">Pilih Pasar:</label>
                                    <select class="form-select w-auto" id="select-pasar" name="id_pasar">
                                        @foreach ($selectList as $list)
                                            <option value="{{ $list->id_pasar }}">{{ $list->nama_pasar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Pasokan</th>
                                        <th>Satuan Harga</th>
                                        <th>Satuan Pasokan</th>
                                    </tr>
                                </thead>
                                <tbody id="harga-pasokan-input-container">
                                    @foreach ($produkList as $index => $produk)
                                    <tr>
                                        <td class="align-middle">
                                            <input type="hidden" name="data[{{ $index }}][id_produk]" value="{{ $produk->id_produk }}">
                                            {{ $produk->nama_produk }}
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" class="form-control @error('data.' . $index . '.harga') is-invalid @enderror" name="data[{{ $index }}][harga]" placeholder="Harga" value="0" step="0.01">
                                            @error('data.' . $index . '.harga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" class="form-control @error('data.' . $index . '.pasokan') is-invalid @enderror" name="data[{{ $index }}][pasokan]" placeholder="Pasokan" value="0" step="0.01">
                                            @error('data.' . $index . '.pasokan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" class="form-control @error('data.' . $index . '.satuan_harga') is-invalid @enderror" name="data[{{ $index }}][satuan_harga]" value="Kg">
                                            @error('data.' . $index . '.satuan_harga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" class="form-control @error('data.' . $index . '.satuan_pasokan') is-invalid @enderror" name="data[{{ $index }}][satuan_pasokan]" value="Kg">
                                            @error('data.' . $index . '.satuan_pasokan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>

                    <!-- Tabel Form Grosir -->

                    <div class="tab-pane fade" id="grosir" role="tabpanel" aria-labelledby="grosir-tab">
                        <form action="{{ route('laporan.store') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="tipe_harga" value="grosir">

                            <div class="d-flex">
                                <div class="mt-3 me-4">
                                    <label for="" class="form-label">Tanggal Entry</label>
                                    <input type="date" name="tgl_entry" id="tgl_entry" class="form-control w-auto @error('tgl_entry', 'grosir') is-invalid @enderror" value="{{ old('tgl_entry', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                    
                                    @error('tgl_entry', 'grosir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <label for="select-pasar" class="form-label">Pilih Pasar:</label>
                                    <select class="form-select w-auto" id="select-pasar" name="id_pasar">
                                        @foreach ($selectList as $list)
                                            <option value="{{ $list->id_pasar }}">{{ $list->nama_pasar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Pasokan</th>
                                        <th>Satuan Harga</th>
                                        <th>Satuan Pasokan</th>
                                    </tr>
                                </thead>
                                <tbody id="harga-pasokan-input-container">
                                    @foreach ($produkList as $index => $produk)
                                    <tr>
                                        <td>
                                            <input type="hidden" name="data[{{ $index }}][id_produk]" value="{{ $produk->id_produk }}">
                                            {{ $produk->nama_produk }}
                                        </td>
                                        <td><input type="number" class="form-control" name="data[{{ $index }}][harga]" placeholder="Harga" value="0" step="0.01"></td>
                                        <td><input type="number" class="form-control" name="data[{{ $index }}][pasokan]" placeholder="Pasokan" value="0" step="0.01"></td>
                                        <td><input type="text" class="form-control" name="data[{{ $index }}][satuan_harga]" value="Kg"></td>
                                        <td><input type="text" class="form-control" name="data[{{ $index }}][satuan_pasokan]" value="Kg"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>

                <!-- Tabel Form Produsen -->
                @elseif($tipe == 'produsen')
                    <div class="tab-pane fade show active" id="produsen" role="tabpanel" aria-labelledby="produsen-tab">
                        <form action="{{ route('laporan.store') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="tipe_harga" value="produsen">

                            <div class="d-flex">
                                <div class="mt-3 me-4">
                                    <label for="" class="form-label">Tanggal Entry</label>
                                    <input type="date" name="tgl_entry" id="tgl_entry" class="form-control w-auto @error('tgl_entry', 'produsen') is-invalid @enderror" value="{{ old('tgl_entry', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                    
                                    @error('tgl_entry', 'produsen')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <label for="select-pasar" class="form-label">Pilih Kecamatan:</label>
                                    <select class="form-select w-auto" id="select-kecamatan" name="id_kecamatan">
                                        @foreach ($selectList as $list)
                                            <option value="{{ $list->id_kecamatan }}">{{ $list->nama_kecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Pasokan</th>
                                        <th>Satuan Harga</th>
                                        <th>Satuan Pasokan</th>
                                    </tr>
                                </thead>
                                <tbody id="harga-pasokan-input-container">
                                    @foreach ($produkList as $index => $produk)
                                    <tr>
                                        <td>
                                            <input type="hidden" name="data[{{ $index }}][id_produk]" value="{{ $produk->id_produk }}">
                                            {{ $produk->nama_produk }}
                                        </td>
                                        <td><input type="number" class="form-control" name="data[{{ $index }}][harga]" placeholder="Harga" value="0" step="0.01"></td>
                                        <td><input type="number" class="form-control" name="data[{{ $index }}][pasokan]" placeholder="Pasokan" value="0" step="0.01"></td>
                                        <td><input type="text" class="form-control" name="data[{{ $index }}][satuan_harga]" value="Kg"></td>
                                        <td><input type="text" class="form-control" name="data[{{ $index }}][satuan_pasokan]" value="Kg"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
