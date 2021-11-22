@extends('layouts.page')

@section('content')
    <div class="container">
        <div class="my-5">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Shorten url</th>
                        <th>Long url</th>
                        <th class="text-center">Visits</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shortenUrls as $shortenUrl)
                        <tr>
                            <td>{{ $shortenUrl->id }}</td>
                            <td>
                                <a target="_blank" href="{{ $shortenUrl->shorten_url }}">
                                    {{ Str::limit($shortenUrl->shorten_url, 40) }}
                                </a>
                            </td>
                            <td>
                                <a target="_blank" href="{{ $shortenUrl->destination_url }}">
                                    {{ Str::limit($shortenUrl->destination_url, 40) }}
                                </a>
                            </td>
                            <td class="text-center">{{ $shortenUrl->visits_count }}</td>
                            <td>{{ $shortenUrl->created_at }}</td>
                            <td>
                                <a href="{{ route('shorten-urls.show', $shortenUrl) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $shortenUrls->links() !!}
        </div>
    </div>
@endsection