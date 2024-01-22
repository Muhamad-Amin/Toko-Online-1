@extends('layouts.main')

@section('title', 'Categories')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
    {{-- Banner Start --}}
    <section class="container-fluid py-5 d-flex justify-content-center align-items-center banner">
        <div class="conatainer">
            <h1 class="text-warning mb-5">Silahkan pilih categori yang anda inginkan</h1>
        </div>
    </section>
    {{-- Banner End --}}

    {{-- Categories Start --}}
    <section class="container-fluid py-5">
        <div class="container">
            <h1 class="text-center mb-5">Categories</h1>

            <div class="row justify-content-center">
                @if ($categories->count())
                    @foreach ($categories as $categori)
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                            <div class="card">
                                @if ($categori->image == '')
                                    <img class="card-img-top" src="{{ asset('img/notFound.jpeg') }}"
                                        alt="{{ $categori->name }}">
                                @else
                                    <img class="card-img-top img-thumbnail"
                                        src="{{ asset('storage/photo/' . $categori->image) }}" alt="{{ $categori->name }}">
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title">{{ $categori->name }}</h4>
                                    <a href="/categori/{{ $categori->id }}" class="btn btn-success">See more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                        <h4 class="text-center">Categori Belum Tersedia</h4>
                    </div>
                @endif
            </div>

        </div>
    </section>
    {{-- Categories End --}}

@endsection
