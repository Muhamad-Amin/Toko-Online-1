@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    {{-- Banner Start --}}
    <section class="container-fluid py-5 d-flex justify-content-center align-items-center banner">
        <div class="container">
            <h1 class="text-warning text-center mb-5">Selamat Datang Di Toko Online</h1>

            <form action="" method="get">
                @csrf
                <div class="col-md-10 col-lg-4 offset-md-1 offset-lg-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Search or All"
                            aria-label="Button" autocomplete="off">
                        <button class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    {{-- Banner End --}}


    {{-- Categories Start --}}
    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center mb-5 fs-1">Categori</h2>

            <div class="row justify-content-center">
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
                                @if (Auth::user())
                                    <a href="/categori/{{ $categori->id }}" class="btn btn-success">See more</a>
                                @else
                                    <a href="/login" class="btn btn-success">Login</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    {{-- Categories End --}}


    {{-- Products Terbaru Start --}}
    <section class="container-fluid py-5 top-terbaru">
        <div class="container">
            <h1 class="text-center mb-5">
                Product Terbaru
            </h1>

            <div class="row justify-content-center">

                @foreach ($productsTerbaru as $productTerbaru)
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card h-100 hovered-card">
                            @if ($productTerbaru->image == '')
                                <img class="card-img-top img-thumbnail" src="{{ asset('img/notFound.jpeg') }}"
                                    alt="{{ $productTerbaru->name }}">
                            @else
                                <img class="card-img-top img-thumbnail"
                                    src="{{ asset('storage/photo/' . $productTerbaru->image) }}"
                                    alt="{{ $productTerbaru->name }}">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{ $productTerbaru->name }}</h4>
                                <div class="d-flex justify-content-between">
                                    @if (Auth::user())
                                        <a href="/product/{{ $productTerbaru->id }}" class="btn btn-outline-success">see
                                            more</a>
                                        <a href="//https://wa.me/{{ $productTerbaru->user->no_hp }}"
                                            class="btn btn-outline-primary">
                                            <i class="fab fa-whatsapp"></i> Buy
                                        </a>
                                    @else
                                        <a href="/login" class="btn btn-outline-success">Login</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- Products Terbaru End --}}

    {{-- Products Start --}}
    <section class="container-fluid py-5 bg-success">
        <div class="container">
            <h2 class="text-center text-white mb-5 fs-2">Product</h2>

            <div class="row justify-content-center">

                @if ($products->count())
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                            <div class="card h-100">
                                @if ($product->image == '')
                                    <img class="card-img-top img-thumbnail" src="{{ asset('img/notFound.jpeg') }}"
                                        alt="{{ $product->name }}">
                                @else
                                    <img class="card-img-top img-thumbnail"
                                        src="{{ asset('storage/photo/' . $product->image) }}" alt="{{ $product->name }}">
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title">{{ $product->name }}</h4>

                                    <h5 class="text-warning">
                                        Rp {{ $product->harga }}
                                    </h5>
                                    <p class="card-text">
                                        by <a href=""
                                            class="text-decoration-none text-success">{{ $product->user->name }}</a>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        @if (Auth::user())
                                            <a href="/product/{{ $product->id }}" class="btn btn-outline-success">see
                                                more</a>
                                            <a href="//https://wa.me/{{ $product->user->no_hp }}"
                                                class="btn btn-outline-primary">
                                                <i class="fab fa-whatsapp"></i> Buy
                                            </a>
                                        @else
                                            <a href="/login" class="btn btn-outline-success">Login</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                        <h2 class="text-center">
                            Product belum ada
                        </h2>
                    </div>
                @endif

            </div>

            <div class="">
                {{ $products->links() }}
            </div>
        </div>
    </section>
    {{-- Products End --}}


@endsection
