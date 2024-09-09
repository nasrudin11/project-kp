<div id="sidebar" class="sidebar d-flex flex-column flex-shrink-0 p-3 shadow" style="height: 100vh">
    <div class="d-flex justify-content-center align-items-center link-body-emphasis text-decoration-none mb-3 mt-3">
        <img src="{{ asset('img/logo3.png') }}" alt="logo" width="40px" class="me-2">
        <img src="{{ asset('img/logo2.png') }}" alt="logo" height="40px">
        {{-- <h4 class="logo-text m-0">Kominfo</h4> --}}
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <!-- Index Section -->
        <li class="nav-header text-secondary">MAIN</li>
        <li>
            <a href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard' : '/dashboard' }}" class="nav-link nav-link-hover {{ ($title == 'Dashboard' || $title == 'Dashboard Admin') ? 'active' : '' }}" aria-current="page">
                <i class="bi bi-house-door-fill me-2"></i>
                <span class="poppins-medium">Dashboard</span>
            </a>
        </li>

        <!-- Manajemen Data Section (Tampil hanya untuk Admin) -->
        @if (Auth::user()->role == 'admin')
            <li class="nav-header text-secondary mt-3">MANAJEMEN DATA</li>
            <li>
                <a href="/admin-dashboard/produk" class="nav-link nav-link-hover {{ $title == 'Data Produk' ? 'active' : '' }}" aria-current="page">
                    <i class="bi bi-box-fill me-2"></i>
                    <span class="poppins-medium">Data Produk</span>
                </a>
            </li>
            <li>
                <a href="/admin-dashboard/akun-user" class="nav-link nav-link-hover {{ $title == 'Data Akun User' ? 'active' : '' }}" aria-current="page">
                    <i class="bi bi-people-fill me-2"></i>
                    <span class="poppins-medium">Data Akun</span>
                </a>
            </li>
            <li>
                <a href="/admin-dashboard/data-lokasi" class="nav-link nav-link-hover {{ $title == 'Data Lokasi' ? 'active' : '' }}" aria-current="page">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    <span class="poppins-medium">Data Lokasi</span>
                </a>
            </li>
        @endif

        <!-- Data Section -->
        <li class="nav-header text-secondary mt-3">DATA</li>
        <li class="btn-group dropend w-100">
            <a type="button" class="nav-link nav-link-hover dropdown-toggle w-100 {{ ($title == 'Data Harga' || $title == 'Data Pasokan') ? 'active' : '' }}" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-grid-fill me-2"></i>
                <span class="poppins-medium">Data</span>
            </a>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard/data-harga' : '/dashboard/data-harga' }}">Data Harga</a></li>
                <li><a class="dropdown-item" href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard/data-pasokan' : '/dashboard/data-pasokan' }}">Data Pasokan</a></li>
            </ul>
        </li>

        <!-- Laporan Section -->
        <li class="nav-header text-secondary mt-3">CETAK</li>
        <li>
            <a href="#" class="nav-link nav-link-hover" data-bs-toggle="modal" data-bs-target="#modalPilihTanggal">
                <i class="bi bi-printer-fill me-2"></i>
                <span class="poppins-medium">Cetak Laporan</span>
            </a>
        </li>
        
    </ul>
</div>

<!-- Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    {{-- <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div> --}}
    <div class="offcanvas-body">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/logo3.png') }}" alt="logo" width="40px" class="me-2">
            <img src="{{ asset('img/logo2.png') }}" alt="logo" height="40px">
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <!-- Index Section -->
            <li class="nav-header text-secondary">MAIN</li>
            <li>
                <a href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard' : '/dashboard' }}" class="nav-link nav-link-hover {{ ($title == 'Dashboard' || $title == 'Dashboard Admin') ? 'active' : '' }}" aria-current="page">
                    <i class="bi bi-house-door-fill me-2"></i>
                    <span class="poppins-medium">Dashboard</span>
                </a>
            </li>

            <!-- Manajemen Data Section (Tampil hanya untuk Admin) -->
            @if (Auth::user()->role == 'admin')
                <li class="nav-header text-secondary mt-3">MANAJEMEN DATA</li>
                <li>
                    <a href="/admin-dashboard/produk" class="nav-link nav-link-hover {{ $title == 'Data Produk' ? 'active' : '' }}" aria-current="page">
                        <i class="bi bi-box-fill me-2"></i>
                        <span class="poppins-medium">Data Produk</span>
                    </a>
                </li>
                <li>
                    <a href="/admin-dashboard/akun-user" class="nav-link nav-link-hover {{ $title == 'Data Akun User' ? 'active' : '' }}" aria-current="page">
                        <i class="bi bi-people-fill me-2"></i>
                        <span class="poppins-medium">Data Akun</span>
                    </a>
                </li>
                <li>
                    <a href="/admin-dashboard/data-lokasi" class="nav-link nav-link-hover {{ $title == 'Data Lokasi' ? 'active' : '' }}" aria-current="page">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        <span class="poppins-medium">Data Lokasi</span>
                    </a>
                </li>
            @endif

            <!-- Data Section -->
            <li class="nav-header text-secondary mt-3">DATA</li>

            <li>
                <button class="nav-link nav-link-hover w-100 text-start {{ ($title == 'Data Harga' || $title == 'Data Pasokan') ? 'active' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMenu" aria-expanded="false" aria-controls="collapseMenu">
                    <i class="bi bi-grid-fill me-2"></i>
                    <span class="poppins-medium">Data</span>
                </button>
                <div class="collapse" id="collapseMenu">
                    <ul class="list-group mt-2">
                        <li class="list-group-item">
                            <a class="dropdown-item" href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard/data-harga' : '/dashboard/data-harga' }}">Data Harga</a>
                        </li>
                        <li class="list-group-item">
                            <a class="dropdown-item" href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard/data-pasokan' : '/dashboard/data-pasokan' }}">Data Pasokan</a>
                        </li>
                    </ul>
                </div>
            </li>
            

            <!-- Laporan Section -->
            <li class="nav-header text-secondary mt-3">CETAK</li>
            <li>
                <a href="#" class="nav-link nav-link-hover" data-bs-toggle="modal" data-bs-target="#modalPilihTanggal">
                    <i class="bi bi-printer-fill me-2"></i>
                    <span class="poppins-medium">Cetak Laporan</span>
                </a>
            </li>
        </ul>
    </div>
</div>

@if(Auth::user()->role == 'admin')

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

@elseif (Auth::user()->role == "pedagang")

    <div class="modal fade" id="modalPilihTanggal" tabindex="-1" aria-labelledby="modalPilihTanggalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPilihTanggalLabel">Pilih Tanggal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cetak_laporan_detail') }}" method="GET">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <input type="hidden" name="pasar" value="{{ Auth::user()->id_pasar }}">
                        <input type="hidden" name="tipe" value="pedagang">

                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@else

    <div class="modal fade" id="modalPilihTanggal" tabindex="-1" aria-labelledby="modalPilihTanggalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPilihTanggalLabel">Pilih Tanggal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cetak_laporan_detail') }}" method="GET">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <input type="hidden" name="kecamatan" value="{{ Auth::user()->id_kecamatan }}">
                        <input type="hidden" name="tipe" value="produsen">

                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endif






