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
                <h1>freeCodeCamp</h1>
                <section class="d-flex my-4">
                    <section class="me-4"><span class="fw-bold">153</span> posts</section>
                    <section class="me-4"><span class="fw-bold">23k</span> followers</section>
                    <section class="me-4"><span class="fw-bold">212</span> following</section>
                </section>
                <h2 class="fs-6">freeCodeCamp.org</h2>
                <p class="my-1">
                    We're a global community of millions of people learning to code together.<br>
                    LearnToCodeRPG: https://www.freecodecamp.org/news/learn-to-code-rpg/
                </p>
                <a href="https://www.freecodecamp.org">www.freecodecamp.org</a>
            </section>
        </section>
        <section class="row my-5">
            <section class="col-4 p-2"><img src="https://picsum.photos/300/300" alt="image" class="img-fluid w-100"></section>
            <section class="col-4 p-2"><img src="https://picsum.photos/301/301" alt="image" class="img-fluid w-100"></section>
            <section class="col-4 p-2"><img src="https://picsum.photos/302/302" alt="image" class="img-fluid w-100"></section>
        </section>
    </section>
@endsection
