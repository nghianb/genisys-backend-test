@extends('layouts.master')

@section('page')
    <div class="d-flex flex-column min-vh-100">
        <header class="p-3 bg-dark text-white">
            @include('partials.header')
        </header>
        <main class="flex-grow-1">
            @yield('content')
        </main>
        <footer class="mt-auto py-3">
            @include('partials.footer')
        </footer>
    </div>
@endsection