<div id="data-pasar-ratarata">
    <h4 class="text-center mt-4">Data Pasokan Bahan Pangan di Kabupaten Lamongan</h4>
    <table class="table table-bordered table-hover text-center mt-4">
        <thead class="table-primary align-middle">
            <tr>
                <th rowspan="2">KOMODITI</th>
                @foreach ($kecamatans as $kecamatan)
                    <th rowspan="2">{{ $kecamatan->nama_kecamatan }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataProdusen as $komoditi => $rows)
                <tr>
                    <td>{{ $komoditi }}</td>
                    @foreach ($kecamatans as $kecamatan)
                        <td>
                            @php
                                $pasokan = $rows->where('id_kecamatan', $kecamatan->id_kecamatan)->first();
                            @endphp
                             {{ $pasokan ? number_format($pasokan->pasokan) : '-' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
