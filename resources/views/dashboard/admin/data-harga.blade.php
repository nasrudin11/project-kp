
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

    <div class="card shadow border-0 mt-4">
        <div class="card-body">

            <div class="d-flex mb-4 align-items-center">
                <!-- Select for Pilih Tipe -->
                <div class="me-3">
                    <h5>Pilih Tipe</h5>
                    <select class="form-select" id="pilihTipe">
                        <option value="pedagang" selected>Pedagang</option>
                        <option value="produsen">Produsen</option>
                    </select>
                </div>

                <!-- Select for Pilih Pasar, hidden by default -->
                <div class="me-3" id="selectPasarContainer" style="display: none;">
                    <h5>Pilih Pasar</h5>
                    <select class="form-select" id="pilihPasar">
                        @foreach ($pasars as $pasar)
                            <option value="{{ $pasar->id_pasar }}">
                                {{ $pasar->nama_pasar }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Select for Pilih Kecamatan, hidden by default -->
                <div id="selectKecamatanContainer" style="display: none;">
                    <h5>Pilih Kecamatan</h5>
                    <select class="form-select" id="pilihKecamatan">
                        @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id_kecamatan }}">
                                {{ $kecamatan->nama_kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Tabs and Data Section -->
            <div id="content-pedagang">
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-pengecer" href="#">Pengecer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-grosir" href="#">Grosir</a>
                    </li>
                </ul>

                <div id="data-pengecer">
                    <h4 class="text-center mt-4">Data Harga Pangan Tingkat Pedagang Pengecer</h4>
                    <table class="table table-bordered table-hover text-center mt-4">
                        <thead class="table-primary align-middle">
                            <tr>
                                <th rowspan="3">NO</th>
                                <th rowspan="3">KOMODITI</th>
                                <th colspan="10">HARGA (Kg)</th>
                            </tr>
                            <tr>
                                <th colspan="2">Minggu 1 (Kg)</th>
                                <th colspan="2">Minggu 2 (Kg)</th>
                                <th colspan="2">Minggu 3 (Kg)</th>
                                <th colspan="2">Minggu 4 (Kg)</th>
                                <th colspan="2">Minggu 5 (Kg)</th>
                            </tr>
                            <tr>
                                <th>Senin</th>
                                <th>Kamis</th>
                                <th>Senin</th>
                                <th>Kamis</th>
                                <th>Senin</th>
                                <th>Kamis</th>
                                <th>Senin</th>
                                <th>Kamis</th>
                                <th>Senin</th>
                                <th>Kamis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Beras Premium</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Beras</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="data-grosir" class="d-none">
                    <h4 class="text-center mt-4">Data Harga Pangan Tingkat Pedagang Grosir</h4>
                    <!-- Tabel Data Grosir -->
                    <table class="table table-bordered table-hover text-center mt-4">
                        <thead class="table-primary align-middle">
                            <tr>
                                <th rowspan="3">NO</th>
                                <th rowspan="3">KOMODITI</th>
                                <th colspan="10">HARGA (Kg)</th>
                            </tr>
                            <tr>
                                <th colspan="2">Minggu 1 (Kg)</th>
                                <th colspan="2">Minggu 2 (Kg)</th>
                                <th colspan="2">Minggu 3 (Kg)</th>
                                <th colspan="2">Minggu 4 (Kg)</th>
                                <th colspan="2">Minggu 5 (Kg)</th>
                            </tr>
                            <tr>
                                <th>Senin</th>
                                <th>Kamis</th>
                                <th>Senin</th>
                                <th>Kamis</th>
                                <th>Senin</th>
                                <th>Kamis</th>
                                <th>Senin</th>
                                <th>Kamis</th>
                                <th>Senin</th>
                                <th>Kamis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Beras Premium</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Beras</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="content-produsen" class="d-none">
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-produsen" href="#">Produsen</a>
                    </li>
                </ul>

                <h4 class="text-center mt-4">Data Harga Pangan Tingkat Produsen</h4>
                <table class="table table-bordered table-hover text-center mt-4">
                    <thead class="table-primary align-middle">
                        <tr>
                            <th rowspan="3">NO</th>
                            <th rowspan="3">KOMODITI</th>
                            <th colspan="10">HARGA (Kg)</th>
                        </tr>
                        <tr>
                            <th colspan="2">Minggu 1 (Kg)</th>
                            <th colspan="2">Minggu 2 (Kg)</th>
                            <th colspan="2">Minggu 3 (Kg)</th>
                            <th colspan="2">Minggu 4 (Kg)</th>
                            <th colspan="2">Minggu 5 (Kg)</th>
                        </tr>
                        <tr>
                            <th>Senin</th>
                            <th>Kamis</th>
                            <th>Senin</th>
                            <th>Kamis</th>
                            <th>Senin</th>
                            <th>Kamis</th>
                            <th>Senin</th>
                            <th>Kamis</th>
                            <th>Senin</th>
                            <th>Kamis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Beras Premium</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Beras</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>

<script>
    // Event listener for Pilih Tipe select dropdown
    document.getElementById('pilihTipe').addEventListener('change', (event) => {
        const selectedTipe = event.target.value;
        if (selectedTipe === 'pedagang') {
            document.getElementById('content-pedagang').classList.remove('d-none');
            document.getElementById('content-produsen').classList.add('d-none');
            document.getElementById('selectPasarContainer').style.display = 'block';
            document.getElementById('selectKecamatanContainer').style.display = 'none';
        } else if (selectedTipe === 'produsen') {
            document.getElementById('content-pedagang').classList.add('d-none');
            document.getElementById('content-produsen').classList.remove('d-none');
            document.getElementById('selectPasarContainer').style.display = 'none';
            document.getElementById('selectKecamatanContainer').style.display = 'block';
        }
    });

    // Tabs switching for Pengecer and Grosir
    document.getElementById('tab-pengecer').addEventListener('click', (event) => {
        event.preventDefault();
        document.getElementById('data-pengecer').classList.remove('d-none');
        document.getElementById('data-grosir').classList.add('d-none');
        document.getElementById('tab-pengecer').classList.add('active');
        document.getElementById('tab-grosir').classList.remove('active');
    });

    document.getElementById('tab-grosir').addEventListener('click', (event) => {
        event.preventDefault();
        document.getElementById('data-pengecer').classList.add('d-none');
        document.getElementById('data-grosir').classList.remove('d-none');
        document.getElementById('tab-pengecer').classList.remove('active');
        document.getElementById('tab-grosir').classList.add('active');
    });
</script>
@endsection