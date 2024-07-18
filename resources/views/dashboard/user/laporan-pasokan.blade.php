@extends('layouts.log-main')


@section('content')
    <main class="container-fluid mt-3">
        <div class="card shadow border-0">
            <div class="card-body">
                <h4 class="text-center">Data Harga Pasokan Pangan <br> Tingkat Pedagang Pengecer</h4>

                <table class="table table-bordered table-hover text-center mt-4">
                    <thead class="table-primary align-middle ">
                        <tr>
                            <th rowspan="3">NO</th>
                            <th rowspan="3">KOMODITI</th>
                            <th colspan="10">PASOKAN (Kg)</th>
                        </tr>
                        <tr>
                            <th colspan="2">Minggu 1 (Kg)</th>
                            <th colspan="2">Minggu 2 (Kg)</th>
                            <th colspan="2">Minggu 3 (Kg)</th>
                            <th colspan="2">Minggu 4 (Kg)</th>
                            <th colspan="2">Minggu 5 (Kg)</th>
                        </tr>
                        <tr>
                            <th>Senin</th>
                            <th>Kamis</th>
                            <th>Senin</th>
                            <th>Kamis</th>
                            <th>Senin</th>
                            <th>Kamis</th>
                            <th>Senin</th>
                            <th>Kamis</th>
                            <th>Senin</th>
                            <th>Kamis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Beras Premium</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Beras</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
