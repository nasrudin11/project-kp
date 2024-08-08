@extends('layouts.log-main')

@section('content')
  <main class="container mt-3 mb-3">
    @include('partials.log-navbar')

    <div class="container d-flex align-items-center justify-content-between mt-4">
        <h4>{{ $title }}</h4>
    
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile Administrator</li>
            </ol>
        </nav>
    </div>

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

    <div class="row mt-4">
      <div class="col-md-5 mb-4">
        <div class="card shadow border-0 text-center">
          <div class="card-body d-flex flex-column align-items-center">

            
            @if (Auth::user()->gambar_profil)
                <img src="{{ asset('storage/' . Auth::user()->gambar_profil) }}" alt="" width="180px" height="180px" class="rounded-circle border border-black border-2 mb-2">
            @else
                <img src="" alt="" width="180px" height="180px" class="rounded-circle border border-primary mb-2">
            @endif
                <span class="poppins-bold mt-2">{{ Auth::user()->role }}</span>
                <span class="poppins-medium mt-1">{{ Auth::user()->name }}</span>
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
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                  
                      <div class="row mb-3">
                          <div class="col-md-6">
                              <label for="inputNama" class="col-form-label">Nama</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputNama" name="name" value="{{ old('name', Auth::user()->name) }}">
                              @error('name')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="col-md-6">
                              <label for="inputEmail" class="col-form-label">Email</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email', Auth::user()->email) }}">
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
                              <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat" name="alamat" value="{{ old('alamat', Auth::user()->alamat) }}">
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
                              <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="inputNoTelp" name="no_tlp" value="{{ old('no_tlp', Auth::user()->no_tlp) }}">
                              @error('no_tlp')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="col-md-6">
                              <label for="inputTanggalLahir" class="col-form-label">Tanggal Lahir</label>
                              <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="inputTanggalLahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}">
                              @error('tanggal_lahir')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                      </div>
                      <div class="row mb-3">
                          <div class="col-md-6">
                              <label class="col-form-label">Jenis Kelamin</label>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenisKelaminLaki" value="laki-laki" {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'laki-laki' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="jenisKelaminLaki">Laki-laki</label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenisKelaminPerempuan" value="perempuan" {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'perempuan' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="jenisKelaminPerempuan">Perempuan</label>
                              </div>
                              @error('jenis_kelamin')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                  
                  </div>
                  <div class="tab-pane fade" id="reset" role="tabpanel" aria-labelledby="reset-tab">
                    <form action="{{ route('password.update') }}" method="POST">
                      @csrf
                      <div class="row mb-3">
                          <label for="inputPassword" class="col-sm-2 col-form-label">Password Baru</label>
                          <div class="col-sm-10">
                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password">
                              @error('password')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                          <div class="col-sm-10">
                              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputConfirmPassword" name="password_confirmation">
                              @error('password_confirmation')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Reset Password</button>
                  </form>
                  
                  </div>
              </div>
          </div>
      </div>
      
      </div>
    </div>
  </main>
@endsection
