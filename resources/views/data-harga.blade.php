@extends('layouts.main')

@section('content')
<main class="container mt-3 mb-3">

    <div class="container mt-3">
        <h4>{{ $title }}</h4>     
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
                            <form action="{{ route('handle-filter') }}" method="POST" id="form-pasar">
                                @csrf
                                <input type="hidden" name="active_tab" value="tab-pasar">
                                <input type="hidden" name="tipe" value="harga">
                                <label for="select-pasar" class="form-label">Pilih Pasar:</label>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <select class="form-select w-auto" id="select-pasar" name="id_pasar">
                                            <option value="semua" {{ $id_pasar == 'semua' ? 'selected' : '' }}>Semua</option>
                                            @foreach ($pasars as $pasar)
                                                <option value="{{ $pasar->id_pasar }}" {{ $id_pasar == $pasar->id_pasar ? 'selected' : '' }}>{{ $pasar->nama_pasar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                                
                            </form>
                        </div>
                        
                            @if($id_pasar == 'semua')
                                @include('partials.tabel.harga.data-pasar-ratarata', [
                                    'dataPengecer' => $dataPengecer,
                                    'dataGrosir' => $dataGrosir,
                                    'pasars' => $pasars
                                ])
                            @elseif($id_pasar != 'semua')
                                @include('partials.tabel.harga.data-pasar-detail', [
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
                            <form action="{{ route('handle-filter') }}" method="POST" id="form-kecamatan">
                                @csrf
                                <input type="hidden" name="active_tab" value="tab-kecamatan">
                                <input type="hidden" name="tipe" value="harga">
                                <label for="select-kecamatan" class="form-label">Pilih Kecamatan:</label>

                                <div class="d-flex">
                                    <div class="me-2">
                                        <select class="form-select w-auto" id="select-kecamatan" name="id_kecamatan">
                                            <option value="semua" {{ $id_kecamatan == 'semua' ? 'selected' : '' }}>Semua</option>
                                            @foreach ($kecamatans as $kecamatan)
                                                <option value="{{ $kecamatan->id_kecamatan }}" {{ $id_kecamatan == $kecamatan->id_kecamatan ? 'selected' : '' }}>{{ $kecamatan->nama_kecamatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </form>
                        </div>

                            @if($id_kecamatan == 'semua')
                                @include('partials.tabel.harga.data-kecamatan-ratarata', [
                                    'dataProdusen' => $dataProdusen,
                                    'kecamatans' => $kecamatans
                                ])
                            @elseif($id_kecamatan != 'semua')
                                @include('partials.tabel.harga.data-kecamatan-detail', [
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


@endsection
