@extends('layouts.app')

@section('content')
    <section class="container">
        <section class="row my-5">
            <section class="col-3">
                <section class="px-5">
                    <img src="https://picsum.photos/200/200" alt="logo" class="rounded-circle img-fluid">
                </section>
            </section>
            <section class="col-9">
                <section class="d-flex align-items-baseline">
                    <h1 class="flex-grow-1">{{ $user->username }}</h1>
                    @can('update', $user->profile)
                        <a href="{{ route('profile.edit', $user->id) }}" class="me-3">Edit profile</a>
                    @endcan
                    <a href="{{ route('post.create') }}">Add post</a>
                </section>
                <section class="d-flex my-4">
                    <section class="me-4">
                        <span class="fw-bold">{{ $user->posts->count() }}</span> posts
                    </section>
                    <section class="me-4"><span class="fw-bold">23k</span> followers</section>
                    <section class="me-4"><span class="fw-bold">212</span> following</section>
                </section>
                <h2 class="fs-6 fw-bold">{{ $user->profile->title ?? '' }}</h2>
                <p class="my-1">{{ $user->profile->description ?? '' }}</p>
                <a href="#">{{ $user->profile->url ?? '' }}</a>
            </section>
        </section>
        <section class="row my-5">
            @foreach ($user->posts as $post)
                <section class="col-4 p-2">
                    <a href="{{ route('post.show', $post->id) }}">
                        <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="img-fluid w-100">
                    </a>
                </section>
            @endforeach
        </section>
    </section>
@endsection
