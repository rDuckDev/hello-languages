@extends('layouts.app')

@section('content')
    <section class="container">
        @foreach ($posts as $post)
            <section class="row">
                <a href="{{ route('profile.show', $post->user->id) }}" class="col-6 offset-3">
                    <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="img-fluid w-100">
                </a>
            </section>
            <section class="row pt-2 pb-4">
                <section class="col-6 offset-3">
                    <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-reset fw-bold">
                        {{ $post->user->username }}
                    </a>
                    {{ $post->caption }}
                </section>
            </section>
        @endforeach
        <section class="row">
            <section class="col-12 d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-4') }}
            </section>
        </section>
    </section>
@endsection
