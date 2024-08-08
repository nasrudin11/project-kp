@extends('layouts.log-main')

@section('content')

<main class="container mt-3 mb-3">
    @include('partials.log-navbar')

    <div class="container d-flex justify-content-between align-items-center mt-4">
        <h4>{{ $title }}</h4>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 rounded-pill bg-secondary bg-opacity-10 p-2">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow border-0 mt-3">
        <div class="card-body">
            <div id="chart-pengecer-container" class="chart-container"></div>
        </div>
    </div>

    <div class="card shadow border-0 mt-3">
        <div class="card-body">
            <div id="chart-grosir-container" class="chart-container"></div>
        </div>
    </div>

    <div class="card shadow border-0 mt-3">
        <div class="card-body">
            <div id="chart-produsen-container" class="chart-container"></div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var monthName = new Date().toLocaleString('default', { month: 'long' });
        var chartData = @json($chartData);
        var datesFormatted = @json($datesFormatted);

        if (chartData.pengecer && chartData.pengecer.length) {
            Highcharts.chart('chart-pengecer-container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Kenaikan dan Penurunan Harga Produk (Pengecer)'
                },
                subtitle: {
                    text: monthName + ' ' + new Date().getFullYear()
                },
                xAxis: {
                    categories: datesFormatted,
                    title: {
                        text: 'Tanggal'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Harga (Rp)'
                    },
                    min: 0,
                    max: 120000,
                    tickInterval: 20000
                },
                series: chartData.pengecer
            });
        }

        if (chartData.grosir && chartData.grosir.length) {
            Highcharts.chart('chart-grosir-container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Kenaikan dan Penurunan Harga Produk (Grosir)'
                },
                subtitle: {
                    text: monthName + ' ' + new Date().getFullYear()
                },
                xAxis: {
                    categories: datesFormatted,
                    title: {
                        text: 'Tanggal'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Harga (Rp)'
                    },
                    min: 0,
                    max: 120000,
                    tickInterval: 20000
                },
                series: chartData.grosir
            });
        }

        if (chartData.produsen && chartData.produsen.length) {
            Highcharts.chart('chart-produsen-container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Kenaikan dan Penurunan Harga Produk (Produsen)'
                },
                subtitle: {
                    text: monthName + ' ' + new Date().getFullYear()
                },
                xAxis: {
                    categories: datesFormatted,
                    title: {
                        text: 'Tanggal'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Harga (Rp)'
                    },
                    min: 0,
                    max: 120000,
                    tickInterval: 20000
                },
                series: chartData.produsen
            });
        }
    });
</script>

@endsection
