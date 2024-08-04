<div id="data-pasar-ratarata">
    <h4 class="text-center mt-4">Data Rata-Rata Harga Pangan Tingkat Pengecer</h4>
    <table class="table table-bordered table-hover text-center mt-4">
        <thead class="table-primary align-middle">
            <tr>
                <th>KOMODITI</th>
                @foreach ($pasars as $pasar)
                    <th>{{ $pasar->nama_pasar }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPengecer as $komoditi => $rows)
                <tr>
                    <td>{{ $komoditi }}</td>
                    @foreach ($pasars as $pasar)
                        <td>
                            @php
                                $pasokan = $rows->where('id_pasar', $pasar->id_pasar)->first();
                            @endphp
                            {{ $pasokan ? number_format($pasokan->pasokan) : '-' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="text-center mt-4">Data Rata-Rata Harga Pangan Tingkat Grosir</h4>
    <table class="table table-bordered table-hover text-center mt-4">
        <thead class="table-primary align-middle">
            <tr>
                <th>KOMODITI</th>
                @foreach ($pasars as $pasar)
                    <th>{{ $pasar->nama_pasar }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataGrosir as $komoditi => $rows)
                <tr>
                    <td>{{ $komoditi }}</td>
                    @foreach ($pasars as $pasar)
                        <td>
                            @php
                                $pasokan = $rows->where('id_pasar', $pasar->id_pasar)->first();
                            @endphp
                            {{ $pasokan ? number_format($pasokan->pasokan) : '-' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
