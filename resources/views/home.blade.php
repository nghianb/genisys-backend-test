@extends('layouts.page')

@section('content')
    <div class="bg-light">
        <div class="container">
            <div class="row justify-content-center py-4">
                <div class="col-lg-7">
                    <h1 class="text-center">Free URL Shortener</h1>
                    <p class="text-center">It is a free tool to shorten URLs. Create short & memorable links in seconds.</p>
                    <form action="{{ route('shorten-urls.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input
                                name="destination_url"
                                type="text"
                                class="form-control form-control-lg"
                                placeholder="Enter long url here"
                                value="{{ old('destination_url') }}">
                            @error('destination_url')
                                <small class="text-danger">{{ $errors->first('destination_url') }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            {!! NoCaptcha::display() !!}
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn btn-primary btn-lg" type="submit">Make shorten URL</button>
                        </div>
                    </form>
                    @include('components.recommendation-alert')
                </div>
            </div>
        </div>
    </div>
    <div class="p-5">
        <div class="container">
            <h2 class="text-center">A fast and simple URL shortener</h2>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas repellendus deserunt eum amet in, optio obcaecati accusamus! Dignissimos quasi eius vero mollitia itaque quo minima cum, autem velit consectetur reiciendis molestiae dolores dicta quia cumque! Quos porro ex est vitae repellendus labore temporibus, vel exercitationem velit accusantium, voluptatum quaerat beatae culpa placeat. Libero sapiente eum a eaque omnis optio ut expedita hic sed suscipit, placeat, magni nesciunt ad soluta tempore? Consectetur molestias inventore dolores dolorum laboriosam expedita, voluptatibus culpa. Quasi quia facilis dolore alias obcaecati exercitationem laudantium aliquid quibusdam. Repellat quibusdam harum deleniti praesentium possimus natus nostrum sit dolore iusto?</p>
        </div>
    </div>
@endsection

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush