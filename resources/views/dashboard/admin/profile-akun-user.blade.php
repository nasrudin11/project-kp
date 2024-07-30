@extends('layouts.log-main')

@section('content')
<main class="container mt-3 mb-3">
    @include('partials.log-navbar')

    <div class="container d-flex align-items-center justify-content-between mt-4">
        <h4>{{ $title }}</h4>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Akun User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Profil {{ $user->name }}</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-md-5">
            <div class="card shadow border-0 text-center">
                <div class="card-body d-flex flex-column align-items-center">
                    @if ($user->gambar_profil)
                     <img src="{{ asset('storage/' . $user->gambar_profil) }}" alt="" width="180px" height="180px" class="rounded-circle border border-black border-2 mb-2">
                    @else
                        <img src="" alt="" width="180px" height="180px" class="rounded-circle border border-primary mb-2">
                    @endif
                    <span class="poppins-bold mt-2">{{ $user->role }}</span>
                    <span class="poppins-medium mt-1">{{ $user->name }}</span>

                    @if($user->role == 'produsen' && !empty($user->kecamatan))
                        <span class="poppins-medium mt-1">{{ $user->kecamatan->nama_kecamatan }}</span>
                    @elseif ($user->role == 'pedagang' && !empty($user->pasar))
                        <span class="poppins-medium mt-1">{{ $user->pasar->nama_pasar }}</span>
                    @endif
                
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card shadow border-0">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reset-tab" data-bs-toggle="tab" data-bs-target="#reset" type="button" role="tab" aria-controls="reset" aria-selected="false">Reset Password</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="{{ route('profile-akun-user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputNama" class="col-form-label">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputNama" name="name" value="{{ old('name', $user->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="col-form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputAlamat" class="col-form-label">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat" name="alamat" value="{{ old('alamat', $user->alamat) }}">
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFoto" class="col-form-label">Foto</label>
                                        <input type="file" class="form-control @error('gambar_profil') is-invalid @enderror" id="inputFoto" name="gambar_profil">
                                        @error('gambar_profil')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputNoTelp" class="col-form-label">No Telp</label>
                                        <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="inputNoTelp" name="no_tlp" value="{{ old('no_tlp', $user->no_tlp) }}">
                                        @error('no_tlp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputTanggalLahir" class="col-form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="inputTanggalLahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputRole" class="col-form-label">Role</label>
                                        <div>
                                            <input type="radio" id="rolePedagang" name="role" value="Pedagang" {{ ($user->role) == 'pedagang' ? 'checked' : '' }}>
                                            <label for="rolePedagang">Pedagang</label>
                                            <input type="radio" id="roleProdusen" name="role" value="Produsen" {{ ($user->role) == 'produsen' ? 'checked' : '' }}>
                                            <label for="roleProdusen">Produsen</label>
                                        </div>
                                        @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputJenisKelamin" class="col-form-label">Jenis Kelamin</label>
                                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="inputJenisKelamin" name="jenis_kelamin">
                                            <option value="" disabled>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-md-6 d-none" id="pasarContainer">
                                        <label for="inputPasar" class="col-form-label">Pasar</label>
                                        <select class="form-select @error('id_pasar') is-invalid @enderror" id="inputPasar" name="id_pasar">
                                            <option value="" disabled>Pilih Pasar</option>
                                            @foreach ($pasar as $pasarItem)
                                                <option value="{{ $pasarItem->id_pasar }}" {{ $user->id_pasar == $pasarItem->id_pasar ? 'selected' : '' }}>
                                                    {{  $pasarItem->nama_pasar }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_pasar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 d-none" id="kecamatanContainer">
                                        <label for="inputKecamatan" class="col-form-label">Kecamatan</label>
                                        <select class="form-select @error('id_kecamatan') is-invalid @enderror" id="inputKecamatan" name="id_kecamatan">
                                            <option value="" disabled>Pilih Kecamatan</option>
                                            @foreach ($kecamatan as $kecamatanItem)
                                                <option value="{{ $kecamatanItem->id_kecamatan }}" {{  $user->id_kecamatan == $kecamatanItem->id_kecamatan ? 'selected' : '' }}>
                                                    {{ $kecamatanItem->nama_kecamatan, $kecamatanItem->nama_kecamatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_kecamatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            
                            <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const rolePedagang = document.getElementById('rolePedagang');
                                const roleProdusen = document.getElementById('roleProdusen');
                                const pasarContainer = document.getElementById('pasarContainer');
                                const kecamatanContainer = document.getElementById('kecamatanContainer');
                            
                                function updateVisibility() {
                                    if (rolePedagang.checked) {
                                        pasarContainer.classList.remove('d-none');
                                        kecamatanContainer.classList.add('d-none');
                                    } else if (roleProdusen.checked) {
                                        pasarContainer.classList.add('d-none');
                                        kecamatanContainer.classList.remove('d-none');
                                    } else {
                                        pasarContainer.classList.add('d-none');
                                        kecamatanContainer.classList.add('d-none');
                                    }
                                }
                            
                                rolePedagang.addEventListener('change', updateVisibility);
                                roleProdusen.addEventListener('change', updateVisibility);
                            
                                // Initial visibility setup based on the current value
                                updateVisibility();
                            });
                            </script>
                            
                        </div>

                        <div class="tab-pane fade" id="reset" role="tabpanel" aria-labelledby="reset-tab">
                            <form action="{{ route('profile-akun-user.update-password', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="inputPassword" class="col-form-label">Password Baru</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputPasswordConfirmation" class="col-form-label">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="inputPasswordConfirmation" name="password_confirmation" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

