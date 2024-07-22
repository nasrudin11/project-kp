@extends('layouts.log-main')


@section('content')
    <main class="container-fluid mt-3">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="text-center flex-grow-1">Data Akun User</h4>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        User Baru
                    </button>

                    <!-- Modal Tambah User -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">User Baru</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama User</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                            
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar_profil" class="form-label">Gambar Produk</label>
                                            <input type="file" class="form-control @error('gambar_profil') is-invalid @enderror" id="gambar_profil" name="gambar_profil">

                                            @error('gambar_profil')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-select" id="role" name="role" required>
                                                <option value="produsen">Produsen</option>
                                                <option value="pedagang">Pedagang</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <table class="table table-striped mt-4">
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
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-role="#editModal{{ $user->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </main>
@endsection
