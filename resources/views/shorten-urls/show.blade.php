@extends('layouts.page')

@section('content')
    <div class="bg-light">
        <div class="container">
            <div class="row justify-content-center py-4">
                <div class="col-lg-7">
                    <h1 class="text-center">Your URL Shortener</h1>
                    <p class="text-center">It is a free tool to shorten URLs. Create short & memorable links in seconds.</p>
                    <form action="{{ route('shorten-urls.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Your long url</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $shortenUrl->destination_url }}">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-copy"></i>
                                </button>
                                <a href="{{ $shortenUrl->destination_url }}" target="_blank" class="btn btn-outline-secondary">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Your shorten url</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $shortenUrl->shorten_url }}">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-copy"></i>
                                </button>
                                <a href="{{ $shortenUrl->shorten_url }}" target="_blank" class="btn btn-outline-secondary">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                    @include('components.recommendation-alert')
                </div>
            </div>
        </div>
    </div>
    <div class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <canvas id="pageViewChart"></canvas>
                </div>
                <div class="col-lg-4">
                    <canvas id="deviceChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $.get('{{ route("shorten-urls.analytics.page-view", $shortenUrl) }}')
            .then(function (response) {
                const data = {
                    labels: response.map(pageView => pageView.date),
                    datasets: [{
                        label: 'Page view',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: response.map(pageView => pageView.views),
                    }]
                };

                const config = {
                    type: 'line',
                    data: data,
                    options: {}
                };

                const pageViewChart = new Chart(
                    document.getElementById('pageViewChart'),
                    config
                );
            });
    </script>
    <script>
        const DEVICE_COLORS = {
            desktop: 'green',
            mobile: 'yellow',
            tablet: 'red'
        };

        $.get('{{ route("shorten-urls.analytics.device", $shortenUrl) }}')
            .then(function (response) {
                const data = {
                    labels: response.map(device => device.device),
                    datasets: [
                        {
                            label: 'Dataset 1',
                            data: response.map(device => device.count),
                            backgroundColor: response.map(device => DEVICE_COLORS[device.device]),
                        }
                    ]
                };
                
                const config = {
                    type: 'pie',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        }
                    },
                };

                const deviceChart = new Chart(
                    document.getElementById('deviceChart'),
                    config
                );
            });        
    </script>
@endpush