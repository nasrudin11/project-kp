@extends('layouts.main')

@section('content')

    <div class="container-fluid m-0 p-0">
        <div id="carouselExampleCaptions" class="carousel slide ">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="\img\carousel\carousel-1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="\img\carousel\carousel-2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="\img\carousel\carousel-4.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <main class="container mt-5 mb-5">   

        <div class="container p-0">
            <h5>Data Tingkat Pengecer</h5>
            <span>Tanggal {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
            <div class="scrollimage mt-3">
                @foreach($dataPengecer as $komoditi => $items)
                    <div class="card border-0 me-4 shadow" style="width: 220px; height: 220px;">
                        <img src="{{ $items->first()->gambar ? asset('storage/' . $items->first()->gambar) : 'https://via.placeholder.com/400x200' }}" 
                             class="card-img-top" 
                             alt="{{ $komoditi }}" 
                             style="height: 150px; object-fit: cover; width: 100%;">
                        <div class="card-body" style="height: 100px; overflow: hidden;">
                            <p class="card-title">{{ $komoditi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>   
        </div>
        

        <div class="container mt-4 p-0">
            <h5>Data Tingkat Grosir</h3>
            <span>Tanggal {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
            <div class="scrollimage mt-3 pb-4">
                @foreach($dataPengecer as $komoditi => $items)
                    <div class="card border-0 me-4 shadow" style="width: 220px; height: 220px;">
                        <img src="{{ $items->first()->gambar ? asset('storage/' . $items->first()->gambar) : 'https://via.placeholder.com/400x200' }}" 
                            class="card-img-top" 
                            alt="{{ $komoditi }}" 
                            style="height: 150px; object-fit: cover; width: 100%;">
                        <div class="card-body" style="height: 100px; overflow: hidden;">
                            <p class="card-title">{{ $komoditi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>

        <div class="container mt-4 p-0">
            <h5>Data Tingkat Produsen</h3>
            <span>Tanggal {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
            <div class="scrollimage mt-3 pb-4">
                @foreach($dataProdusen as $komoditi => $items)
                    <div class="card border-0 me-4 shadow" style="width: 220px; height: 220px;">
                        <img src="{{ $items->first()->gambar ? asset('storage/' . $items->first()->gambar) : 'https://via.placeholder.com/400x200' }}" 
                            class="card-img-top" 
                            alt="{{ $komoditi }}" 
                            style="height: 150px; object-fit: cover; width: 100%;">
                        <div class="card-body" style="height: 100px; overflow: hidden;">
                            <p class="card-title">{{ $komoditi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

@endsection
