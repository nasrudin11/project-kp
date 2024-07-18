<div id="sidebar" class="sidebar d-flex flex-column flex-shrink-0 p-3 shadow" style="height: 100vh">
    <button class="btn mb-3" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>
    
    <div class="d-flex link-body-emphasis text-decoration-none">
        <img src="img/logo.png" alt="logo" class="logo">
        <h4 class="logo-text">Kominfo</h4>
    </div>
  
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard' : '/dashboard' }}" class="nav-link {{ ($title == 'Dashboard' || $title == 'Dashboard Admin') ? 'active-custom' : 'custom-hover' }}" aria-current="page">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Dashboard</span>
            </a>
        </li>
  
        <!-- Dropdown Produk -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($title == 'Produk') ? 'active-custom' : '' }}" href="#" id="produkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-grid-fill"></i>
                <span>Produk</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="produkDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Action two</a></li>
                <li><a class="dropdown-item" href="#">Action three</a></li>
            </ul>
        </li>
        
        <!-- Dropdown Produk -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($title == 'Produk') ? 'active-custom' : ' ' }}" href="#" id="produkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-grid-fill"></i>
                <span>Produk</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="produkDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Action two</a></li>
                <li><a class="dropdown-item" href="#">Action three</a></li>
            </ul>
        </li>
  
        <li>
            <a href="/update-harga" class="nav-link {{ ($title == 'Cetak Laporan') ? 'active-custom' : 'custom-hover' }}">
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
            <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-fill-gear me-2"></i>Profile</a></li>
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
  



{{-- <div id="sidebar" class="sidebar d-flex flex-column flex-shrink-0 p-3 shadow" style="height: 100vh">
  <button class="btn mb-3" id="sidebarToggle">
      <i class="bi bi-list"></i>
  </button>
  
  <div class="d-flex link-body-emphasis text-decoration-none">
      <img src="img/logo.png" alt="logo" class="logo">
      <h4 class="logo-text">Kominfo</h4>
  </div>

  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
      <li>
          <a href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard' : '/dashboard' }}" class="nav-link {{ ($title == 'Dashboard' || $title == 'Dashboard Admin') ? 'active-custom' : 'custom-hover' }}" aria-current="page">
              <i class="bi bi-layout-text-window-reverse"></i>
              <span>Dashboard</span>
          </a>
      </li>

      <div class="btn-group dropend">
        <a type="button" class="nav-link dropdown-toggle {{ ($title == 'Pasokan') ? 'active-custom' : 'custom-hover' }}" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-grid-fill"></i>
            <span>Produk</span>
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Action two</a></li>
            <li><a class="dropdown-item" href="#">Action three</a></li>
        </ul>
    </div>

      <li>
        <a class="nav-link custom-hover d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#collapseProduk" role="button" aria-expanded="{{ ($title == 'Harga' || $title == 'Pasokan') ? 'true' : 'false' }}" aria-controls="collapseProduk">
            <div>
                <i class="bi bi-grid-fill"></i>
                <span>Produk</span>
                <i class="bi bi-chevron-down" style="font-size: 12px"></i>
            </div>
            
        </a>
        <div class="collapse {{ $title == 'Data Produk' ? 'show' : '' }}" id="collapseProduk">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="/data-harga" class="nav-link {{ ($title == 'Harga') ? 'active-custom' : 'custom-hover' }}">
                        <i class="bi bi-currency-dollar" style="font-size: 14px"></i>
                        <span style="font-size: 14px">Harga</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-pasokan" class="nav-link {{ ($title == 'Pasokan') ? 'active-custom' : 'custom-hover' }}">
                        <i class="bi bi-boxes" style="font-size: 14px"></i>
                        <span style="font-size: 14px">Pasokan</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    
    <li>
        <a class="nav-link custom-hover d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#collapsePelaporan" role="button" aria-expanded="{{ ($title == 'Harga Pelaporan' || $title == 'Pasokan Pelaporan') ? 'true' : 'false' }}" aria-controls="collapsePelaporan">
            <div>
                <i class="bi bi-grid-fill"></i>
                <span>Pelaporan</span>               
                <i class="bi bi-chevron-down" style="font-size: 12px"></i>
            </div>
        </a>
        <div class="collapse {{ ($title == 'Harga Pelaporan' || $title == 'Pasokan Pelaporan') ? 'show' : '' }}" id="collapsePelaporan">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="/update-harga/harga" class="nav-link {{ ($title == 'Harga Pelaporan') ? 'active-custom' : 'custom-hover' }}">
                        <i class="bi bi-currency-dollar" style="font-size: 14px"></i>
                        <span style="font-size: 14px">Harga</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/update-harga/pasokan" class="nav-link {{ ($title == 'Pasokan Pelaporan') ? 'active-custom' : 'custom-hover' }}">
                        <i class="bi bi-boxes" style="font-size: 14px"></i>
                        <span style="font-size: 14px">Pasokan</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    

      <li>
        <a href="/update-harga" class="nav-link {{ ($title == 'Cetak Laporan') ? 'active-custom' : 'custom-hover' }}">
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
</div> --}}