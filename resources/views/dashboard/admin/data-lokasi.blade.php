@extends('layouts.log-main')

@section('content')
<div class="container mt-3">

    @include('partials.log-navbar')

    <div class="container d-flex justify-content-between align-items-center mt-4">
        <h4>{{ $title }}</h4>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Lokasi</li>
            </ol>
        </nav>       
    </div>

    <!-- Pesan Sukses -->
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Menampilkan pesan kesalahan atau sukses -->
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h2>Pasar</h2>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary rounded-pill pe-3 ps-3 mb-4 shadow" data-bs-toggle="modal" data-bs-target="#tambahModalPasar">
                        Tambah<i class="bi bi-plus-circle ms-2"></i>
                    </button>

                    <!-- Modal Tambah Pasar -->
                    <div class="modal fade" id="tambahModalPasar" tabindex="-1" aria-labelledby="tambahModalPasarLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalPasarLabel">Tambah Data Pasar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('store.pasar') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="namaPasar" class="form-label">Nama Pasar</label>
                                            <input type="text" class="form-control @error('nama_pasar') is-invalid @enderror" id="namaPasar" name="nama_pasar" value="{{ old('nama_pasar') }}" required>
                                            @error('nama_pasar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="alamatPasar" class="form-label">Alamat Pasar</label>
                                            <input type="text" class="form-control" id="alamatPasar" name="alamat_pasar" value="{{ old('alamat_pasar') }}">
                                            @error('alamat_pasar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <table id="pasar-table" class="table table-striped mt-4">
                        <thead class="table-primary align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama Pasar</th>
                                <th>Alamat Pasar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasars as $index => $pasar)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pasar->nama_pasar }}</td>
                                    <td>{{ $pasar->alamat_pasar }}</td>
                                    <td>
                                        <!-- Trigger modal for editing -->
                                        <button class="btn btn-warning btn-sm shadow" data-bs-toggle="modal" data-bs-target="#editModalPasar{{ $pasar->id_pasar }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- Trigger modal for delete confirmation -->
                                        <button class="btn btn-danger btn-sm shadow" data-bs-toggle="modal" data-bs-target="#confirmDeletePasar{{ $pasar->id_pasar }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Edit Modal Pasar -->
                                <div class="modal fade" id="editModalPasar{{ $pasar->id_pasar }}" tabindex="-1" aria-labelledby="editModalPasarLabel{{ $pasar->id_pasar }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalPasarLabel{{ $pasar->id_pasar }}">Edit Data Pasar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('update.pasar', $pasar->id_pasar) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="editNamaPasar{{ $pasar->id_pasar }}" class="form-label">Nama</label>
                                                        <input type="text" class="form-control @error('nama_pasar') is-invalid @enderror" id="editNamaPasar{{ $pasar->id_pasar }}" name="nama_pasar" value="{{ $pasar->nama_pasar }}" required>
                                                        
                                                        @error('nama_pasar')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                
                                                    <div class="mb-3">
                                                        <label for="editAlamatPasar{{ $pasar->id_pasar }}" class="form-label">Alamat</label>
                                                        <input type="text" class="form-control" id="editAlamatPasar{{ $pasar->id_pasar }}" name="alamat_pasar" value="{{ $pasar->alamat_pasar }}">

                                                        @error('alamat_pasar')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirm Delete Modal Pasar -->
                                <div class="modal fade" id="confirmDeletePasar{{ $pasar->id_pasar }}" tabindex="-1" aria-labelledby="confirmDeletePasarLabel{{ $pasar->id_pasar }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeletePasarLabel{{ $pasar->id_pasar }}">Konfirmasi Hapus Data Pasar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus data pasar ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{ route('delete.pasar', $pasar->id_pasar) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h2>Kecamatan</h2>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary rounded-pill pe-3 ps-3 mb-4 shadow" data-bs-toggle="modal" data-bs-target="#tambahModalKecamatan">
                        Tambah<i class="bi bi-plus-circle ms-2"></i>
                    </button>

                    <!-- Modal Tambah Kecamatan -->
                    <div class="modal fade" id="tambahModalKecamatan" tabindex="-1" aria-labelledby="tambahModalKecamatanLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalKecamatanLabel">Tambah Data Kecamatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('store.kecamatan') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="namaKecamatan" class="form-label">Nama Kecamatan</label>
                                            <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror" id="namaKecamatan" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}" required>
                                            @error('nama_kecamatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <table id="kecamatan-table" class="table table-striped mt-4">
                        <thead class="table-primary align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama Kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatans as $index => $kecamatan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $kecamatan->nama_kecamatan }}</td>
                                    <td>
                                        <!-- Trigger modal for editing -->
                                        <button class="btn btn-warning btn-sm shadow" data-bs-toggle="modal" data-bs-target="#editModalKecamatan{{ $kecamatan->id_kecamatan }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- Trigger modal for delete confirmation -->
                                        <button class="btn btn-danger btn-sm shadow" data-bs-toggle="modal" data-bs-target="#confirmDeleteKecamatan{{ $kecamatan->id_kecamatan }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Edit Modal Kecamatan -->
                                <div class="modal fade" id="editModalKecamatan{{ $kecamatan->id_kecamatan }}" tabindex="-1" aria-labelledby="editModalKecamatanLabel{{ $kecamatan->id_kecamatan }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalKecamatanLabel{{ $kecamatan->id_kecamatan }}">Edit Data Kecamatan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('update.kecamatan', $kecamatan->id_kecamatan) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="editNamaKecamatan{{ $kecamatan->id_kecamatan }}" class="form-label">Nama</label>
                                                        <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror" id="editNamaKecamatan{{ $kecamatan->id_kecamatan }}" name="nama_kecamatan" value="{{ old('nama_kecamatan', $kecamatan->nama_kecamatan) }}" required>
                                                        @error('nama_kecamatan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirm Delete Modal Kecamatan -->
                                <div class="modal fade" id="confirmDeleteKecamatan{{ $kecamatan->id_kecamatan }}" tabindex="-1" aria-labelledby="confirmDeleteKecamatanLabel{{ $kecamatan->id_kecamatan }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteKecamatanLabel{{ $kecamatan->id_kecamatan }}">Konfirmasi Hapus Data Kecamatan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus data kecamatan ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{ route('delete.kecamatan', $kecamatan->id_kecamatan) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#pasar-table').DataTable();
        $('#kecamatan-table').DataTable();

        @if (session('error') === 'Pasar Error')
            var tambahModalPasar = new bootstrap.Modal(document.getElementById('tambahModalPasar'));
            tambahModalPasar.show();
        @elseif (session('error') === 'Kecamatan Error')
            var tambahModalKecamatan = new bootstrap.Modal(document.getElementById('tambahModalKecamatan'));
            tambahModalKecamatan.show();
        @endif
    });
</script>


@endsection
