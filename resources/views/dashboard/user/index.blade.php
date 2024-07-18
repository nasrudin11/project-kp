@extends('layouts.log-main')


@section('content')
    <main class="container-fluid mt-3">
        <div class="card shadow border-0">
            <div class="card-body">
                <h1>Dashboard</h1>
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
