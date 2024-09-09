<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <style>
        @page {
            margin: 20mm;
        }
        body {
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-table td {
            border: none;
            padding: 5px; /* Kurangi padding agar lebih cocok dengan ukuran A4 */
            vertical-align: top;
            text-align: center;
        }
        .product-item {
            width: 100%;
            border-collapse: collapse;
        }
        .product-item td {
            border: none;
            padding: 5px;
            text-align: center;
        }
        .product-table .outer-border {
            border: 1px solid #ddd;
        }
        .product-item img {
            width: 80px; /* Sesuaikan ukuran gambar */
            height: 80px; /* Sesuaikan ukuran gambar */
            object-fit: cover;
            display: block;
            margin: 0 auto;
            border: 1px solid #ddd;
        }
        .product-details {
            padding-left: 5px; /* Kurangi padding agar lebih pas */
        }
        .price-info {
            margin-top: 0;
        }
        .price-info p {
            margin: 5px 0;
        }
        .price-info .status {
            font-weight: bold;
        }
        .price-info .status.naik {
            color: green;
        }
        .price-info .status.turun {
            color: red;
        }
        .price-info .status.stabil {
            color: orange;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>HARGA PANGAN POKOK TINGKAT PEDAGANG PENGECEK <br>
        {{ $formattedHeaderDate }}
    </h2>
    
    <table class="product-table">
        @foreach ($dataMinmaxPengecer->chunk(4) as $chunk)
            <tr>
                @foreach ($chunk as $item)
                    <td class="outer-border">
                        <table class="product-item">
                            <tr>
                                <td>
                                    <img src="{{ public_path('storage/' . $item->gambar) }}" alt="{{ $item['komoditi'] }}">
                                </td>
                                <td class="product-details">
                                    <b>{{ $item->komoditi }}</b>
                                    <div class="price-info">
                                        <p>Harga Terendah: Rp {{ number_format($item->harga_terendah, 0, ',', '.') }}</p>
                                        <p>Harga Tertinggi: Rp {{ number_format($item->harga_tertinggi, 0, ',', '.') }}</p>
                                        <p class="status {{ strtolower($item->status_perubahan) }}">
                                            Status: {{ $item->status_perubahan }} {{ $item->perubahan_persen }}
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
    
</body>
</html>
