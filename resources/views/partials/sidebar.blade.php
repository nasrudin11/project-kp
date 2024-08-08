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
            <a href="{{ route('cetak_laporan') }}" class="nav-link nav-link-hover }}">
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
                <a href="{{ route('cetak_laporan') }}" class="nav-link nav-link-hover }}">
                    <i class="bi bi-printer-fill me-2"></i>
                    <span class="poppins-medium">Cetak Laporan</span>
                </a>
            </li>
        </ul>
    </div>
</div>
