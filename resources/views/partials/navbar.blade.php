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
                        <a href="/download" class="nav-link">Download</a>
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

                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                        </button>
                        <ul class="dropdown-menu dropdown-menu-light">
                        <li><a class="dropdown-item" href="#">Data Harga</a></li>
                        <li><a class="dropdown-item" href="#">Data Pasokan</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>

                <li class="nav-item">
                    <a href="/login" class="nav-link">Download</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            @endauth
        </ul>
    </div>
</div>
