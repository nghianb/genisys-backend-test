@extends('layouts.page')

@section('content')
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-lg-4 py-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @enderror
                            </div>
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
                                <label for="password_confirmation" class="form-label">Password confirmation</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                {!! NoCaptcha::display() !!}
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
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