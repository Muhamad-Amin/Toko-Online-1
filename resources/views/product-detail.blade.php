@extends('layouts.main')

@section('title', 'Detail-product')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">

    <!-- Breadcrumb Start -->
    <section class="container-fluid pt-5">
        <div class="container pt-5">
            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>' ;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/products" class="text-decoration-none">Products</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/categori/{{ $product->categori->id }}" class="text-decoration-none">
                            {{ $product->categori->name }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $product->name }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- Breadcrumb End -->

    {{-- Detail Product Start --}}
    <section class="container-fluid py-5">
        <div class="container">
            <div class="row">
                {{-- Image Start --}}
                <div class="col-12 col-md-4 col-lg-5 mb-3 d-flex justify-content-center">
                    @if ($product->image == '')
                        <img src="{{ asset('img/notFound.jpeg') }}" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('storage/photo/' . $product->image) }}" alt="{{ $product->name }}">
                    @endif
                </div>
                {{-- Image End --}}

                {{-- Product Detail Start --}}
                <div class="col-md-7 col-lg-6 offset-md-1 offset-lg-1">
                    <h1>
                        {{ $product->name }}
                    </h1>
                    <p>
                        {!! $product->describe !!}
                    </p>
                    <h2 class="text-warning">
                        Rp {{ $product->harga }}
                    </h2>
                    <a href="//https://wa.me/{{ $product->user->no_hp }}" class="btn btn-outline-primary mt-3 fs-2">
                        Beli <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                {{-- Product Detail End --}}

            </div>
        </div>
    </section>
    {{-- Detail Product End --}}

    {{-- Product Terkait Start --}}
    <section class="container-fluid py-5 bg-success">
        <div class="container">
            <h1 class="text-center text-white mb-5">Product Terkait</h1>

            <div class="row justify-content-center">
                @if ($productTerkait->count())

                    @foreach ($productTerkait as $product)
                        <div class="col-md-3 col-sm-6 mb-3 ">
                            <a href="/product/{{ $product->id }}">
                                @if ($product->image == '')
                                    <img src="{{ asset('img/notFound.jpeg') }}"
                                        class="img-fluid img-thumbnail produk-terkait-image" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('storage/photo/' . $product->image) }}"
                                        class="img-fluid img-thumbnail produk-terkait-image" alt="{{ $product->name }}">
                                @endif
                            </a>
                        </div>
                    @endforeach
                @else
                    <h3 class="text-center text-white">Tidak ada product terkait😢</h3>
                @endif
            </div>
        </div>
    </section>
    {{-- Product Terkait End --}}

@endsection
