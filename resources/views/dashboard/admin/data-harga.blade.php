@extends('layouts.log-main')

@section('content')
<main class="container mt-3">
    @include('partials.log-navbar')

    <div class="container d-flex justify-content-between align-items-center mt-4">
        <h4>{{ $title }}</h4>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Akun</li>
            </ol>
        </nav>       
    </div>

    <div class="card shadow border-0 mt-4">
        <div class="card-body">
            <!-- Tabs for Pasar and Kecamatan -->
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $active_tab == 'tab-pasar' ? 'active' : '' }}" id="tab-pasar" data-bs-toggle="tab" href="#content-pasar" role="tab" aria-controls="content-pasar" aria-selected="{{ $active_tab == 'tab-pasar' ? 'true' : 'false' }}">Pasar</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $active_tab == 'tab-kecamatan' ? 'active' : '' }}" id="tab-kecamatan" data-bs-toggle="tab" href="#content-kecamatan" role="tab" aria-controls="content-kecamatan" aria-selected="{{ $active_tab == 'tab-kecamatan' ? 'true' : 'false' }}">Kecamatan</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="myTabContent">
                <!-- Content for Pasar -->
                <div class="tab-pane fade {{ $active_tab == 'tab-pasar' ? 'show active' : '' }}" id="content-pasar" role="tabpanel" aria-labelledby="tab-pasar">
                    <div id="data-pasar">
                        <!-- Select Dropdown for Pasar -->
                        <div class="mb-4">
                            <form action="{{ route('handle-data') }}" method="POST" id="form-pasar">
                                @csrf
                                <input type="hidden" name="active_tab" value="tab-pasar">
                                <label for="select-pasar" class="form-label">Pilih Pasar:</label>
                                <select class="form-select w-auto" id="select-pasar" name="id_pasar">
                                    <option value="semua" {{ $id_pasar == 'semua' ? 'selected' : '' }}>Pilih Pasar</option>
                                    @foreach ($pasars as $pasar)
                                        <option value="{{ $pasar->id_pasar }}" {{ $id_pasar == $pasar->id_pasar ? 'selected' : '' }}>{{ $pasar->nama_pasar }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        
                            @if($id_pasar == 'semua')
                                @include('partials.tabel.data-pasar-ratarata', [
                                    'dataPengecer' => $dataPengecer,
                                    'dataGrosir' => $dataGrosir,
                                    'pasars' => $pasars
                                ])
                            @elseif($id_pasar != 'semua')
                                @include('partials.tabel.data-pasar-detail', [
                                    'dataDetailPengecer' => $dataDetailPengecer,
                                    'dataDetailGrosir' => $dataDetailGrosir,
                                    'dates' => $dates,
                                    'currentMonthName' => $currentMonthName
                                ])
                            @endif

                    </div>
                </div>

                <!-- Content for Kecamatan -->
                <div class="tab-pane fade {{ $active_tab == 'tab-kecamatan' ? 'show active' : '' }}" id="content-kecamatan" role="tabpanel" aria-labelledby="tab-kecamatan">
                    <div id="data-kecamatan">
                        <!-- Select Dropdown for Kecamatan -->
                        <div class="mb-4">
                            <form action="{{ route('handle-data') }}" method="POST" id="form-kecamatan">
                                @csrf
                                <input type="hidden" name="active_tab" value="tab-kecamatan">
                                <label for="select-kecamatan" class="form-label">Pilih Kecamatan:</label>
                                <select class="form-select w-auto" id="select-kecamatan" name="id_kecamatan">
                                    <option value="semua" {{ $id_kecamatan == 'semua' ? 'selected' : '' }}>Pilih Kecamatan</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id_kecamatan }}" {{ $id_kecamatan == $kecamatan->id_kecamatan ? 'selected' : '' }}>{{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                            @if($id_kecamatan == 'semua')
                                @include('partials.tabel.data-kecamatan-ratarata', [
                                    'dataProdusen' => $dataProdusen,
                                    'kecamatans' => $kecamatans
                                ])
                            @elseif($id_kecamatan != 'semua')
                                @include('partials.tabel.data-kecamatan-detail', [
                                    'dataDetailProdusen' => $dataDetailProdusen,
                                    'dates' => $dates,
                                    'currentMonthName' => $currentMonthName
                                ])
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Simpan tab aktif ke localStorage sebelum submit
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                var activeTab = document.querySelector('.nav-tabs .nav-link.active').getAttribute('id');
                localStorage.setItem('activeTab', activeTab);
            });
        });

        // Memulihkan tab aktif setelah halaman dimuat
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            document.querySelectorAll('.nav-tabs .nav-link').forEach(link => {
                link.classList.remove('active');
                link.setAttribute('aria-selected', 'false');
            });
            document.querySelectorAll('.tab-pane').forEach(tabPane => {
                tabPane.classList.remove('show', 'active');
            });

            var activeLink = document.getElementById(activeTab);
            activeLink.classList.add('active');
            activeLink.setAttribute('aria-selected', 'true');
            var tabContentId = activeLink.getAttribute('href');
            document.querySelector(tabContentId).classList.add('show', 'active');

            localStorage.removeItem('activeTab'); // Hapus setelah digunakan
        }
    });
</script>

@endsection
