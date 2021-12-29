@extends('layouts.app')

@section('content')
    <section class="container">
        <section class="row">
            <section class="col-8">
                <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="img-fluid w-100">
            </section>
            <section class="col-4">
                <section class="d-flex align-items-center">
                    <img src="/storage/{{ $post->user->profile->image }}" alt="logo"
                        class="w-100 img-fluid rouded-circle me-3" style="max-width:40px;">
                    <h1 class="h5 fw-bold">
                        <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-reset">
                            {{ $post->user->username }}
                        </a>
                    </h1>
                </section>
                <hr>
                <p>
                    <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-reset fw-bold">
                        {{ $post->user->username }}
                    </a>
                    {{ $post->caption }}
                </p>
            </section>
        </section>
    </section>
@endsection
