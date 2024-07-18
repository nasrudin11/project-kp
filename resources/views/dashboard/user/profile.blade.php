@extends('layouts.log-main')


@section('content')
    <main class="container-fluid mt-3">
        <div class="card shadow border-0">
            <div class="card-body p-4">
                <h4>Profile</h4>
                <div class="row">
                    <div class="col d-flex flex-column align-items-center">
                        <img src="img/logo.png" alt="" width="200px" class="rounded-circle border border-2 border-primary mb-2">
                        <button class="btn btn-primary btn-sm">Edit</button>
                    </div>

                    <div class="col">
                        <form>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputEmail3" value="{{ Auth::user()->name }}">
                                </div>
                              </div>
                            <div class="row mb-3">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3">
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
