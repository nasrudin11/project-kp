<div id="data-pasar-ratarata">
    <h4 class="text-center mt-4">Data Rata-Rata Harga Pangan Tingkat Produsen</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mt-4" style="font-size: 14px">
            <thead class="table-primary align-middle">
                <tr>
                    <th rowspan="2">KOMODITI</th>
                    @foreach ($kecamatans as $kecamatan)
                        <th rowspan="2">{{ $kecamatan->nama_kecamatan }}</th>
                    @endforeach
                    <th rowspan="2">Harga Rata-rata (Kg)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataProdusen as $komoditi => $rows)
                    <tr>
                        <td>{{ $komoditi }}</td>
                        @foreach ($kecamatans as $kecamatan)
                            <td>
                                @php
                                    $harga = $rows->where('id_kecamatan', $kecamatan->id_kecamatan)->pluck('harga_rata_rata')->first();
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
