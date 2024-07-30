@extends('layouts.log-main')


@section('content')  

    <main class="container mt-3">

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
                <div id="container" style="width: 100%; height: 400px;"></div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const chart = Highcharts.chart('container', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'Price Trends of Staple Foods'
                            },
                            xAxis: {
                                categories: @json($data['categories']),
                                title: {
                                    text: 'Months'
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Price (Kg)',
                                    align: 'high'
                                }
                            },
                            series: @json($data['series']) // Multiple series for each food item
                        });
                    });
                </script>

            </div>
        </div>
    </main>
@endsection
