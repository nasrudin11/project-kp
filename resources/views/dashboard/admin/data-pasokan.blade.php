@extends('layouts.log-main')

@section('content')
<main class="container mt-4">
    @include('partials.log-navbar')

    <div class="container d-flex align-items-center justify-content-between mt-4">
        <h4>{{ $title }}</h4>
    
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pasokan</li>
            </ol>
        </nav>
    </div>
    

    <div class="card shadow border-0 mt-4">
        <div class="card-body">

            <div class="d-flex">
                <!-- Dropdown Menu -->
                <div class="dropdown mb-4 me-2">
                    <button class="btn btn-sm btn-primary dropdown-toggle rounded-pill pe-3 ps-3 mb-2 shadow" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Tipe
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#" id="option-pedagang">Pedagang</a></li>
                        <li><a class="dropdown-item" href="#" id="option-produsen">Produsen</a></li>
                    </ul>
                </div>

                <!-- Dropdown Menu Lanjutan -->
                <div class="dropdown mb-4 me-2">
                    <button class="btn btn-sm btn-primary dropdown-toggle rounded-pill pe-3 ps-3 mb-2 shadow" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Pasar
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#" id="option-pedagang">Pasar Babat</a></li>
                        <li><a class="dropdown-item" href="#" id="option-produsen">Pasar Ikan</a></li>
                    </ul>
                </div>

                <div class="dropdown mb-4">
                    <button class="btn btn-sm btn-primary dropdown-toggle rounded-pill pe-3 ps-3 mb-2 shadow" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Kecamatan
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#" id="option-pedagang">Modo</a></li>
                        <li><a class="dropdown-item" href="#" id="option-produsen">Sidoarjo</a></li>
                    </ul>
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
                    <h4 class="text-center mt-4">Data Pasokan Pangan Tingkat Pedagang Pengecer</h4>
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
                    <h4 class="text-center mt-4">Data Pasokan Pangan Tingkat Pedagang Grosir</h4>
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

                <h4 class="text-center mt-4">Data Pasokan Pangan Tingkat Produsen</h4>
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
                            <td>Gabah Kering Giling (GKG)</td>
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
                            <td>Gabah Basah Giling (GBG)</td>
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

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const optionPedagang = document.getElementById('option-pedagang');
        const optionProdusen = document.getElementById('option-produsen');
        const contentPedagang = document.getElementById('content-pedagang');
        const contentProdusen = document.getElementById('content-produsen');
        const tabPengecer = document.getElementById('tab-pengecer');
        const tabGrosir = document.getElementById('tab-grosir');
        const dataPengecer = document.getElementById('data-pengecer');
        const dataGrosir = document.getElementById('data-grosir');

        function showContent(contentToShow) {
            if (contentToShow === 'pedagang') {
                contentPedagang.classList.remove('d-none');
                contentProdusen.classList.add('d-none');
            } else if (contentToShow === 'produsen') {
                contentPedagang.classList.add('d-none');
                contentProdusen.classList.remove('d-none');
            }
        }

        optionPedagang.addEventListener('click', function (e) {
            e.preventDefault();
            showContent('pedagang');
        });

        optionProdusen.addEventListener('click', function (e) {
            e.preventDefault();
            showContent('produsen');
        });

        tabPengecer.addEventListener('click', function (e) {
            e.preventDefault();
            dataPengecer.classList.remove('d-none');
            dataGrosir.classList.add('d-none');
            tabPengecer.classList.add('active');
            tabGrosir.classList.remove('active');
        });

        tabGrosir.addEventListener('click', function (e) {
            e.preventDefault();
            dataPengecer.classList.add('d-none');
            dataGrosir.classList.remove('d-none');
            tabGrosir.classList.add('active');
            tabPengecer.classList.remove('active');
        });

        // Initial state
        showContent('pedagang');
    });
</script>
@endsection
