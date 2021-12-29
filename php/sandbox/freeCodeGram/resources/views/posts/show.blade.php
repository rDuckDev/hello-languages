@extends('layouts.app')

@section('content')
    <section class="container">
        <section class="row">
            <section class="col-8">
                <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="img-fluid w-100">
            </section>
            <section class="col-4">
                <h1 class="h3">{{ $post->user->username }}</h1>
                <p>{{ $post->caption }}</p>
            </section>
        </section>
    </section>
@endsection
