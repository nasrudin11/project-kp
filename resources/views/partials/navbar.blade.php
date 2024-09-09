<nav class="navbar navbar-expand-lg shadow z-1" style="background-color: #ffff">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/img/logo3.png" alt="Logo" width="30" class="d-inline-block align-text-top">
            <img src="/img/logo2.png" alt="Logo" height="30" class="d-inline-block align-text-top">
            {{-- KOMINFO --}}
        </a>
        <div class="col">
            <div class="row">
                <span class="poppins-bold">PAHALA</span>
            </div>
            <div class="row">
                <span style="font-size: 12px">Panel Harga Lamongan</span>
            </div>
        </div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">{{ Auth::user()->name }}</a></li>
                            <li>
                                <a class="dropdown-item" href="
                                    @if(Auth::user()->role == 'admin')
                                        {{ route('admin.dashboard') }}
                                    @else
                                        {{ route('dashboard') }}
                                    @endif
                                ">Dashboard</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/" class="nav-link">Beranda</a>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                          <li class="nav-item dropdown">
                            <button class="btn btn-light dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                              Informasi
                            </button>
                            <ul class="dropdown-menu dropdown-menu-light">
                              <li><a class="dropdown-item" href="/data-harga">Data Harga</a></li>
                              <li><a class="dropdown-item" href="/data-pasokan">Data Pasokan</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-hover" data-bs-toggle="modal" data-bs-target="#modalPilihTanggal">
                            Download
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link"> Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 200px">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{ Auth::user()->name }}</a></li>
                        <li>
                            <a class="dropdown-item" href="
                                @if(Auth::user()->role == 'admin')
                                    {{ route('admin.dashboard') }}
                                @else
                                    {{ route('dashboard') }}
                                @endif
                            ">Dashboard</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                                    
            @else
                <li class="nav-item">
                    <a href="/" class="nav-link">Beranda</a>
                </li>

                <li class="nav-item dropdown">
                    <button class="btn btn-light dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <li><a class="dropdown-item" href="/data-harga">Data Harga</a></li>
                        <li><a class="dropdown-item" href="/data-pasokan">Data Pasokan</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-hover" data-bs-toggle="modal" data-bs-target="#modalPilihTanggal">
                        Downloads
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link"> Login</a>
                </li>
            @endauth
        </ul>
    </div>
</div>

    <!-- Modal Pilih Tanggal -->
    <div class="modal fade" id="modalPilihTanggal" tabindex="-1" aria-labelledby="modalPilihTanggalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPilihTanggalLabel">Pilih Tanggal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formCetakLaporan" method="GET">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe</label>
                            <select class="form-select" id="tipe" name="tipe" required>
                                <option value="semua">Semua</option>
                                <option value="pedagang">Pedagang</option>
                                <option value="produsen">Produsen</option>
                            </select>
                        </div>
                        <div class="mb-3 d-none" id="selectPasar">
                            <label for="pasar" class="form-label">Nama Pasar</label>
                            <select class="form-select" id="pasar" name="pasar">
                                @foreach($dataPasar as $pasar)
                                    <option value="{{ $pasar->id_pasar }}">{{ $pasar->nama_pasar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 d-none" id="selectKecamatan">
                            <label for="kecamatan" class="form-label">Nama Kecamatan</label>
                            <select class="form-select" id="kecamatan" name="kecamatan">
                                @foreach($dataKecamatan as $kecamatan)
                                    <option value="{{ $kecamatan->id_kecamatan }}">{{ $kecamatan->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('formCetakLaporan');
            const tipe = document.getElementById('tipe').value;
            const selectPasar = document.getElementById('selectPasar');
            const selectKecamatan = document.getElementById('selectKecamatan');

            // Set form action and visibility based on default or selected tipe
            if (tipe == 'semua') {
                form.action = "{{ route('cetak_laporan') }}";
                // Ensure pasar and kecamatan are hidden
                selectPasar.classList.add('d-none');
                selectKecamatan.classList.add('d-none');
            } else {
                form.action = "{{ route('cetak_laporan_detail') }}";
                if (tipe == 'pedagang') {
                    selectPasar.classList.remove('d-none');
                    selectKecamatan.classList.add('d-none');
                } else if (tipe == 'produsen') {
                    selectPasar.classList.add('d-none');
                    selectKecamatan.classList.remove('d-none');
                }
            }
        });

        document.getElementById('tipe').addEventListener('change', function () {
            const form = document.getElementById('formCetakLaporan');
            const tipe = this.value;
            const selectPasar = document.getElementById('selectPasar');
            const selectKecamatan = document.getElementById('selectKecamatan');

            // Reset visibility
            selectPasar.classList.add('d-none');
            selectKecamatan.classList.add('d-none');

            // Adjust form action based on tipe
            if (tipe == 'semua') {
                form.action = "{{ route('cetak_laporan') }}";
            } else {
                form.action = "{{ route('cetak_laporan_detail') }}";
                if (tipe == 'pedagang') {
                    selectPasar.classList.remove('d-none');
                } else if (tipe == 'produsen') {
                    selectKecamatan.classList.remove('d-none');
                }
            }
        });
    </script>
