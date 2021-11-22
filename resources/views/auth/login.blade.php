@extends('layouts.page')

@section('content')
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-lg-4 py-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            @error('login')
                                <div class="mb-3 text-center">
                                    <small class="text-danger">{{ $errors->first('login') }}</small>
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="password" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                {!! NoCaptcha::display() !!}
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush