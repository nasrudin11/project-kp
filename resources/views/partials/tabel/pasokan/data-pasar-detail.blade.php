<div id="data-pasar-detail">
    <h4 class="text-center mt-4">Data Harga Pangan Tingkat Pedagang Pengecer Pasar Babat</h4>
    <h5 class="text-center mt-2">{{ $currentMonthName }}</h5>

    <div class="table-responsive">
        <table class="table table-bordered table-hover mt-4">
            <thead class="table-primary align-middle text-center">
                <tr>
                    <th rowspan="3">NO</th>
                    <th rowspan="3">KOMODITI</th>
                    <th colspan="10">HARGA (Kg)</th>
                </tr>
                <tr>
                    @foreach ($dates as $week => $date)
                        <th colspan="2">Minggu {{ $week }} (Kg)</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($dates as $date)
                        <th>Senin<br>{{ \Carbon\Carbon::parse($date['monday'])->format('d-m-Y') ?? '-' }}</th>
                        <th>Kamis<br>{{ \Carbon\Carbon::parse($date['thursday'])->format('d-m-Y') ?? '-' }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach($dataDetailPengecer as $produkId => $pasokanEntries)
                    <tr>
                        <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $pasokanEntries->first()->nama_produk ?? '-' }}</td>
                        @foreach ($dates as $week => $date)
                            <td class="text-center">
                                @php
                                    $pasokanSenin = $pasokanEntries->firstWhere('tgl_entry', $date['monday']);
                                @endphp
                                @if($pasokanSenin)
                                    <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $pasokanSenin->pasokan }}" data-id="{{ $pasokanSenin->id_harga }}">
                                        {{ $pasokanSenin->pasokan }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                @php
                                    $pasokanKamis = $pasokanEntries->firstWhere('tgl_entry', $date['thursday']);
                                @endphp
                                @if($pasokanKamis)
                                    <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $pasokanKamis->pasokan }}" data-id="{{ $pasokanKamis->id_harga }}">
                                        {{ $pasokanKamis->pasokan }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    <h4 class="text-center mt-4">Data Harga Pangan Tingkat Pedagang Grosir Babat</h4>
    <h5 class="text-center mt-2">{{ $currentMonthName }}</h5>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover mt-4">
            <thead class="table-primary align-middle">
                <tr>
                    <th rowspan="3">NO</th>
                    <th rowspan="3">KOMODITI</th>
                    <th colspan="10">HARGA (Kg)</th>
                </tr>
                <tr>
                    @foreach ($dates as $week => $date)
                        <th colspan="2">Minggu {{ $week }} (Kg)</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($dates as $date)
                        <th>Senin<br>{{ \Carbon\Carbon::parse($date['monday'])->format('d-m-Y') ?? '-' }}</th>
                        <th>Kamis<br>{{ \Carbon\Carbon::parse($date['thursday'])->format('d-m-Y') ?? '-' }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach($dataDetailGrosir as $produkId => $pasokanEntries)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $pasokanEntries->first()->nama_produk ?? '-' }}</td>
                        @foreach ($dates as $week => $date)
                            <td class="text-center">
                                @php
                                    $pasokanSenin = $pasokanEntries->firstWhere('tgl_entry', $date['monday']);
                                @endphp
                                @if($pasokanSenin)
                                    <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $pasokanSenin->pasokan }}" data-id="{{ $pasokanSenin->id_harga }}">
                                        {{ $pasokanSenin->pasokan }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                @php
                                    $pasokanKamis = $pasokanEntries->firstWhere('tgl_entry', $date['thursday']);
                                @endphp
                                @if($pasokanKamis)
                                    <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $pasokanKamis->pasokan }}" data-id="{{ $pasokanKamis->id_harga }}">
                                        {{ $pasokanKamis->pasokan }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
