@extends('layouts.main')

@section('content')

    <main class="container mt-3 mb-3">   

        <div class="container mt-3">
            <h4>{{ $title }}</h4>     
        </div>

        <div class="card shadow border-0 mt-4">
            <div class="card-body">
                <form action="" method="POST" id="form-pasar">
                    @csrf              
                    <div class="mb-2">
                        <label for="select-pasar" class="form-label">Pilih Tipe:</label>
                        <select class="form-select w-auto" id="select-pasar" name="id_pasar">
                            <option value="semua">Pedagang</option>
                            <option value="semua">Produsen</option>
                        </select>
                    </div>
                    
                    <div class="mb-2">
                        <label for="select-pasar" class="form-label">Pilih Pasar:</label>
                        <select class="form-select w-auto" id="select-pasar" name="id_pasar">
                            <option value="semua">Pedagang</option>
                            <option value="semua">Produsen</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="select-pasar" class="form-label">Pilih Kecamatan:</label>
                        <select class="form-select w-auto" id="select-pasar" name="id_pasar">
                            <option value="semua">Pedagang</option>
                            <option value="semua">Produsen</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="select-pasar" class="form-label">Pilh Tanggal:</label>
                        <input type="date" class="form-control w-auto">
                    </div>

                    <button type="submit" class="btn btn-primary">Filter</button>
                    
                </form>
            </div>
        </div>
    </main>

@endsection
