@extends('dashboard.layouts.main')

@section('title', 'Profile')

@section('content')

    <section class="container-fluid py-5">
        <div class="container text-center">
            <h1 class="">Hai 👋 {{ $user->name }}, senang melihat anda</h1>

            <div class="d-flex justify-content-center my-5">
                <div class="col-lg-3 col-md-4 col-sm-8">
                    @if ($user->image == '')
                        <img class="card-img-top img-thumbnail" src="{{ asset('img/notFound.jpeg') }}"
                            alt="{{ $user->name }}">
                    @else
                        <img class="card-img-top img-thumbnail" src="{{ asset('img/' . $user->image) }}"
                            alt="{{ $user->name }}">
                    @endif
                </div>
            </div>

            <h2>Status anda adalah {{ $user->role->name }}</h2>

        </div>
    </section>

@endsection
