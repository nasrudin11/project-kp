<div id="data-pasar-detail">
    <h4 class="text-center mt-4">Data Pasokan Pangan Tingkat Produsen</h4>
    <h5 class="text-center mt-2">{{ $currentMonthName }}</h5>
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
            @foreach($dataDetailProdusen as $produkId => $hargaEntries)
                <tr>
                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $hargaEntries->first()->nama_produk ?? '-' }}</td>
                    @foreach ($dates as $week => $date)
                        <td class="text-center">
                            @php
                                $hargaSenin = $hargaEntries->firstWhere('tgl_entry', $date['monday']);
                            @endphp
                            @if($hargaSenin)
                                <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $hargaSenin->pasokan }}" data-id="{{ $hargaSenin->id_harga }}">
                                    {{ $hargaSenin->pasokan }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
                            @php
                                $hargaKamis = $hargaEntries->firstWhere('tgl_entry', $date['thursday']);
                            @endphp
                            @if($hargaKamis)
                                <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#editModal" data-pasokan="{{ $hargaKamis->pasokan }}" data-id="{{ $hargaKamis->id_harga }}">
                                    {{ $hargaKamis->pasokan }}
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
