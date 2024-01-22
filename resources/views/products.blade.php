@extends('layouts.main')

@section('title', 'Products')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">


    {{-- Banner Start --}}
    <section class="container-fluid py-5 d-flex justify-content-center align-items-center banner">
        <div class="conatainer">
            <h1 class="text-warning mb-5">Silahkan Pilih products Yang anda mau</h1>

            <form action="" method="get">
                @csrf
                <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
                    <div class="input-group mb-3">
                        <input type="text" name="keyword" class="form-control" placeholder="Search" aria-label="Button"
                            autocomplete="off">
                        <button class="btn btn-success" id="">
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


    {{-- Products Start --}}
    <section class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h2 class="text-center pb-2">Categori</h2>
                    <div class="list-group mb-3">
                        <a href="/products" class="list-group-item list-group-item-action active">All</a>
                        @foreach ($categories as $categori)
                            <a href="/categori/{{ $categori->id }}" class="list-group-item list-group-item-action">
                                {{ $categori->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-9">
                    <h2 class="text-center">Products</h2>

                    <div class="row p-2">
                        @if ($products->count())
                            @foreach ($products as $product)
                                <div class="col-sm-6 col-md-4 mb-3">
                                    <div class="card h-100">
                                        @if ($product->image == '')
                                            <img class="card-img-top img-thumbnail" src="{{ asset('img/notFound.jpeg') }}"
                                                alt="{{ $product->name }}">
                                        @else
                                            <img class="card-img-top img-thumbnail"
                                                src="{{ asset('storage/photo/' . $product->image) }}"
                                                alt="{{ $product->name }}">
                                        @endif
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $product->name }}</h4>
                                            <p class="card-text">
                                                by <a href=""
                                                    class="text-decoration-none text-success">{{ $product->user->name }}</a>
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <a href="/product/{{ $product->id }}" class="btn btn-outline-success">see
                                                    more</a>
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
                            <div class="col-sm-6 col-md-4 mb-3">
                                <h4 class="text-center">Product belum ada</h4>
                            </div>
                        @endif
                    </div>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
    {{-- Products End --}}


@endsection
