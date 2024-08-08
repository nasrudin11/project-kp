<div class="card shadow border-0">
    <div class="card-body">
        <div class="row">
            <!-- Tombol di sebelah kiri -->
            <div class="col-auto">
                <button class="btn border border-1 d-block d-lg-none shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <!-- Dropdown di sebelah kanan -->
            <div class="col d-flex justify-content-end">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->gambar_profil)
                            <img src="{{ asset('storage/' . Auth::user()->gambar_profil) }}" alt="" width="32" height="32" class="rounded-circle me-1 border border-2 border-black">
                        @else
                            <img src="{{ asset('img/user-default.png') }}" alt="" width="32" height="32" class="rounded-circle me-1 border border-2 border-black">
                        @endif
                    </a>
                    
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="#"><strong>{{ Auth::user()->name }}</strong></a></li>
                        <li><a class="dropdown-item" href="{{ Auth::user()->role == 'admin' ? '/admin-dashboard/profile' : '/dashboard/profile' }}"><i class="bi bi-person-fill-gear me-2"></i>Profile</a></li>
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
        </div>
    </div>
</div>
