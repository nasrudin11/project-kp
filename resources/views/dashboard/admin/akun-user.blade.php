@extends('layouts.log-main')


@section('content')
    <main class="container mt-3">

        @include('partials.log-navbar')

        <div class="container d-flex justify-content-between align-items-center mt-4">
            <h4>{{ $title }}</h4>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Akun</li>
                </ol>
            </nav>       
        </div>

        <div class="card shadow border-0 mt-4">
            <div class="card-body">

                <button type="button" class="btn btn-sm btn-primary rounded-pill pe-3 ps-3 mb-4 shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah<i class="bi bi-plus-circle ms-2"></i>
                </button>
                
                <!-- Modal Tambah User -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">User Baru</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                
                                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                
                                    <!-- Nama -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="inputNama" class="col-form-label">Nama</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputNama" name="name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="col-form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email') }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                
                                    <!-- Alamat -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="inputAlamat" class="col-form-label">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat" name="alamat" value="{{ old('alamat') }}">
                                            @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Foto -->
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
                                
                                    <!-- No Telp -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="inputNoTelp" class="col-form-label">No Telp</label>
                                            <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="inputNoTelp" name="no_tlp" value="{{ old('no_tlp') }}">
                                            @error('no_tlp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Tanggal Lahir -->
                                        <div class="col-md-6">
                                            <label for="inputTanggalLahir" class="col-form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="inputTanggalLahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <!-- Role -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="inputRole" class="col-form-label">Role</label>
                                            <div>
                                                <input type="radio" id="rolePedagang" name="role" value="pedagang" {{ old('role') == 'pedagang' ? 'checked' : '' }}>
                                                <label for="rolePedagang">Pedagang</label>
                                                <input type="radio" id="roleProdusen" name="role" value="produsen" {{ old('role') == 'produsen' ? 'checked' : '' }}>
                                                <label for="roleProdusen">Produsen</label>
                                            </div>
                                            @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Jenis Kelamin -->
                                        <div class="col-md-6">
                                            <label for="inputJenisKelamin" class="col-form-label">Jenis Kelamin</label>
                                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="inputJenisKelamin" name="jenis_kelamin">
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="laki-laki" {{ old('jenis_kelamin')  == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <!-- Pasar & Kecamatan -->
                                    <div class="row mb-3">
                                        <div class="col-md-6 d-none" id="pasarContainer">
                                            <label for="inputPasar" class="col-form-label">Pasar</label>
                                            <select class="form-select @error('id_pasar') is-invalid @enderror" id="inputPasar" name="id_pasar">
                                                <option value="" disabled selected>Pilih Pasar</option>
                                                @foreach ($pasar as $pasarItem)
                                                    <option value="{{ $pasarItem->id_pasar }}" {{ old('id_pasar') == $pasarItem->id_pasar ? 'selected' : '' }}>
                                                        {{ $pasarItem->nama_pasar }}
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
                                                <option value="" disabled selected>Pilih Kecamatan</option>
                                                @foreach ($kecamatan as $kecamatanItem)
                                                    <option value="{{ $kecamatanItem->id_kecamatan }}" {{ old('id_kecamatan') == $kecamatanItem->id_kecamatan ? 'selected' : '' }}>
                                                        {{ $kecamatanItem->nama_kecamatan }}
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
                                
                                    <!-- Simpan Perubahan -->
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>                             
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Akun User -->                       
                <div class="table-responsive">
                    <table id="akunTable" class="table table-striped" style="width: 100%">
                        <thead class="table-primary align-middle ">
                            <tr>
                                <th>No</th>
                                <th>Gambar_profil</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="align-middle">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        @if ($user->gambar_profil)
                                            <img src="{{ asset('storage/' . $user->gambar_profil) }}" alt="{{ $user->gambar_profil }}" width="50">
                                        @else
                                            Tidak ada gambar_profil
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('profile-akun-user', ['id' => $user->id]) }}" class="btn btn-warning btn-sm shadow">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>

<script>
    $(document).ready(function() {
        $('#akunTable').DataTable();

        @if ($errors->any())
            var exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            exampleModal.show();
        @endif

        // Handle the visibility of Pasar and Kecamatan based on the selected role
        const roleInputs = document.querySelectorAll('input[name="role"]');
        const pasarContainer = document.getElementById('pasarContainer');
        const kecamatanContainer = document.getElementById('kecamatanContainer');
    
        function toggleContainers() {
            const selectedRole = document.querySelector('input[name="role"]:checked');
            if (selectedRole) {
                const roleValue = selectedRole.value;
                if (roleValue === 'pedagang') {
                    pasarContainer.classList.remove('d-none');
                    kecamatanContainer.classList.add('d-none');
                } else if (roleValue === 'produsen') {
                    kecamatanContainer.classList.remove('d-none');
                    pasarContainer.classList.add('d-none');
                } else {
                    pasarContainer.classList.add('d-none');
                    kecamatanContainer.classList.add('d-none');
                }
            }
        }
    
        roleInputs.forEach(input => {
            input.addEventListener('change', toggleContainers);
        });
    
        // Initial call to set the correct visibility based on the current role value
        toggleContainers();
    });
</script>
@endsection
