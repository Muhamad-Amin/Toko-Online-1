@extends('dashboard.layouts.main')

@section('title', 'Detail Product')

@section('content')

    {{-- Detail Product Start --}}
    <section class="container-fluid pt-5">
        <div class="container pt-5">
            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>' ;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard/{{ Auth::user()->id }}" class="text-decoration-none">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/dashboard/products/{{ Auth::user()->id }}" class="text-decoration-none">
                            Product
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $product->name }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>


    <section class="container-fluid pt-3 pb-5">
        <div class="container">
            <div class="row">

                {{-- Image Start --}}
                <div class="col-12 col-md-4 col-lg-5 mb-3 d-flex justify-content-center">
                    @if ($product->image == '')
                        <div class="card">
                            <img src="{{ asset('img/notFound.jpeg') }}" alt="{{ $product->name }}">
                        </div>
                    @else
                        <div class="card">
                            <img src="{{ asset('storage/photo/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>
                    @endif
                </div>
                {{-- Image End --}}

                {{-- Detail Start --}}
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
                    <div class="d-flex justify-content-between mt-3">
                        <a href="/dashboard/products/{{ Auth::user()->id }}" class="btn btn-primary">Back</a>
                        <form action="/dashboard/product/delete/{{ $product->id }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Are your sure?')">Delete</button>
                        </form>
                    </div>
                </div>
                {{-- Detail End --}}

            </div>
        </div>
    </section>
    {{-- Detail Product End --}}

@endsection
