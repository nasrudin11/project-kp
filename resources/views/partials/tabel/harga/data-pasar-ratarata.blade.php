<div id="data-pasar-ratarata">
    <h4 class="text-center mt-4">Data Rata-Rata Harga Pangan Tingkat Pengecer</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mt-4" style="font-size: 14px">
            <thead class="table-primary align-middle">
                <tr>
                    <th rowspan="2">KOMODITI</th>
                    @foreach ($pasars as $pasar)
                        <th rowspan="2">{{ $pasar->nama_pasar }}</th>
                    @endforeach
                    <th rowspan="2">Harga Rata-rata (Kg)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPengecer as $komoditi => $rows)
                    <tr>
                        <td>{{ $komoditi }}</td>
                        @foreach ($pasars as $pasar)
                            <td>
                                @php
                                    $harga = $rows->where('id_pasar', $pasar->id_pasar)->pluck('harga_rata_rata')->first();
                                    echo $harga ? number_format($harga) : '-';
                                @endphp
                            </td>
                        @endforeach
                        <td>{{ number_format($rows->avg('harga_rata_rata')) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    <h4 class="text-center mt-4">Data Rata-Rata Harga Pangan Tingkat Grosir</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mt-4" style="font-size: 14px">
            <thead class="table-primary align-middle">
                <tr>
                    <th rowspan="2">KOMODITI</th>
                    @foreach ($pasars as $pasar)
                        <th rowspan="2">{{ $pasar->nama_pasar }}</th>
                    @endforeach
                    <th rowspan="2">Harga Rata-rata (Kg)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataGrosir as $komoditi => $rows)
                    <tr>
                        <td>{{ $komoditi }}</td>
                        @foreach ($pasars as $pasar)
                            <td>
                                @php
                                    $harga = $rows->where('id_pasar', $pasar->id_pasar)->pluck('harga_rata_rata')->first();
                                    echo $harga ? number_format($harga) : '-';
                                @endphp
                            </td>
                        @endforeach
                        <td>{{ number_format($rows->avg('harga_rata_rata')) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   
</div>
