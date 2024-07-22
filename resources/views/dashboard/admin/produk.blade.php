<!-- resources/views/produk/index.blade.php -->

@extends('layouts.log-main')

@section('content')
    <main class="container-fluid mt-3">        
        <div class="card shadow border-0 mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="text-center flex-grow-1">Data Pasokan Pangan Tingkat Produsen</h4>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Produk
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
                                        <button type="submit" class="btn btn-primary">Tambah Produk</button>
                                    </form>
                                </div>
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

                <table class="table table-striped mt-4">
                    <thead class="table-primary align-middle ">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Ditujukan Untuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                            <tr class="align-middle">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    @if ($produk->gambar)
                                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->gambar }}" width="50">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->target }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $produk->id_produk }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
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
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
@endsection
