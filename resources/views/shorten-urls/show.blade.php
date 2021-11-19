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
            <h2 class="text-center">Analytic coming soon!</h2>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas repellendus deserunt eum amet in, optio obcaecati accusamus! Dignissimos quasi eius vero mollitia itaque quo minima cum, autem velit consectetur reiciendis molestiae dolores dicta quia cumque! Quos porro ex est vitae repellendus labore temporibus, vel exercitationem velit accusantium, voluptatum quaerat beatae culpa placeat. Libero sapiente eum a eaque omnis optio ut expedita hic sed suscipit, placeat, magni nesciunt ad soluta tempore? Consectetur molestias inventore dolores dolorum laboriosam expedita, voluptatibus culpa. Quasi quia facilis dolore alias obcaecati exercitationem laudantium aliquid quibusdam. Repellat quibusdam harum deleniti praesentium possimus natus nostrum sit dolore iusto?</p>
        </div>
    </div>
@endsection