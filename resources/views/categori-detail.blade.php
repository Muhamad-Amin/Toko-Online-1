@extends('layouts.main')

@section('title', 'Detail Product')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">


    {{-- Products Start --}}
    <section class="container-fluid py-5 bg-success">
        <div class="container">
            <h1 class="text-center text-white">Detail Categori {{ $categori->name }}</h1>

            <h2 class="text-center text-white mb-5 mt-3 fs-2">List Products</h2>

            <div class="row justify-content-center">

                @if ($products->count())
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-3 ">
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
                                    <p class="card-text">
                                        by <a href=""
                                            class="text-decoration-none text-success">{{ $product->user->name }}</a>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <a href="/product/{{ $product->id }}" class="btn btn-outline-success">see more</a>
                                        <a href="//https://wa.me/{{ $product->user->no_hp }}"
                                            class="btn btn-outline-primary">
                                            <i class="fab fa-whatsapp"></i> Buy
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3 py-5">
                        <h4 class="text-center text-white">Product belum tersedia</h4>
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
