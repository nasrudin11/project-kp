@extends('layouts.log-main')

@section('content')

    <main class="container mt-4">

        @include('partials.log-navbar')

        <div class="container d-flex justify-content-between align-items-center mt-4">
            <h4>{{ $title }}</h4>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
                </ol>
            </nav>       
        </div>

        <div class="card shadow border-0 mt-4">
            <div class="card-body">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary rounded-pill pe-3 ps-3 mb-4 shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah<i class="bi bi-plus-circle ms-2"></i>
                </button>
                
                <!-- Modal Tambah Produk -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar Produk</label>
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">

                                        @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="target" class="form-label">Ditujukan Untuk</label>
                                        <select class="form-select" id="target" name="target" required>
                                            <option value="Produsen">Produsen</option>
                                            <option value="Pedagang">Pedagang</option>
                                            <option value="Keduanya">Produsen & Pedagang</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table id="produkTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Target</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produks as $produk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($produk->gambar)
                                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" width="100">
                                    @else
                                        No Images
                                    @endif
                                </td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->target }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm shadow" data-bs-toggle="modal" data-bs-target="#editModal{{ $produk->id_produk }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal{{ $produk->id_produk }}" tabindex="-1" aria-labelledby="editModalLabel{{ $produk->id_produk }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel{{ $produk->id_produk }}">Edit Produk</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="name{{ $produk->id_produk }}" class="form-label">Nama Produk</label>
                                                            <input type="text" class="form-control" id="name{{ $produk->id_produk }}" name="nama_produk" value="{{ $produk->nama_produk }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="gambar{{ $produk->id_produk }}" class="form-label">Gambar Produk</label>
                                                            <input type="file" class="form-control" id="gambar{{ $produk->id_produk }}" name="gambar">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="target{{ $produk->id_produk }}" class="form-label">Ditujukan Untuk</label>
                                                            <select class="form-select" id="target{{ $produk->id_produk }}" name="target" required>
                                                                <option value="Produsen" {{ $produk->target == 'Produsen' ? 'selected' : '' }}>Produsen</option>
                                                                <option value="Pedagang" {{ $produk->target == 'Pedagang' ? 'selected' : '' }}>Pedagang</option>
                                                                <option value="Keduanya" {{ $produk->target == 'Keduanya' ? 'selected' : '' }}>Produsen & Pedagang</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </main>



<!-- Delete Modal -->
<div class="modal fade" id="deleteProdukModal" tabindex="-1" aria-labelledby="deleteProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProdukModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus produk ini?</p>
                <input type="hidden" id="deleteProdukId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteProdukButton">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    $(document).ready(function() {
        $('#produkTable').DataTable();
    });
</script>
    

@endsection
