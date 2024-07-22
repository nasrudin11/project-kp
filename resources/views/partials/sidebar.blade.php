<div id="sidebar" class="sidebar d-flex flex-column flex-shrink-0 p-3 shadow" style="height: 100vh">
    <div class="d-flex link-body-emphasis text-decoration-none">
        <img src="../img/logo.png" alt="logo" class="logo">
        <h4 class="logo-text">Kominfo</h4>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard' : '/dashboard' }}" class="nav-link nav-link-hover {{ ($title == 'Dashboard' || $title == 'Dashboard Admin') ? 'active' : '' }}" aria-current="page">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="/admin-dashboard/produk" class="nav-link nav-link-hover {{ $title == 'Produk' ? 'active' : '' }}" aria-current="page">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Produk</span>
            </a>
        </li>

        <li>
            <a href="/admin-dashboard/akun-user" class="nav-link nav-link-hover {{ $title == 'Akun User' ? 'active' : '' }}" aria-current="page">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Akun User</span>
            </a>
        </li>

        <li class="btn-group dropend w-100">
            <a type="button" class="nav-link nav-link-hover dropdown-toggle w-100 {{ ($title == 'Pasokan') ? 'active' : '' }}" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-grid-fill"></i>
                <span>Data</span>
            </a>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="/data-harga">Data Harga</a></li>
                <li><a class="dropdown-item" href="/data-pasokan">Data Pasokan</a></li>
            </ul>
        </li>
        <li class="btn-group dropend w-100">
            <a type="button" class="nav-link nav-link-hover dropdown-toggle w-100 {{ ($title == 'Pelaporan') ? 'active' : '' }}" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-grid-fill"></i>
                <span>Pelaporan</span>
            </a>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="/update-harga">Pelaporan Harga</a></li>
                <li><a class="dropdown-item" href="/update-pasokan">Pelaporan Pasokan</a></li>
            </ul>
        </li>
        <li>
            <a href="/update-harga" class="nav-link nav-link-hover {{ ($title == 'Cetak Laporan') ? 'active' : '' }}">
                <i class="bi bi-grid-fill" width="16" height="16"></i>
                <span>Cetak Laporan</span>
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{ Auth::user()->name }}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2"></i>Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>
