@extends('dashboard.layouts.main')

@section('title', 'Products')

@section('content')

    <section class="container-fluid py-5">
        <div class="container text-center">
            <h1>Selamat datang di halaman products</h1>

            <div class="d-flex justify-content-center">
                @if (Session::has('success'))
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ Session('success') }}
                    </div>
                @endif
            </div>

            <h4>List Products</h4>

            <div class="d-flex justify-content-between my-4">
                <a href="/dashboard/product/add" class="btn btn-primary">Add Data</a>
                <div class="col-lg-4">
                    <form action="" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Serach or All"
                                autocomplete="off">
                            <button class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Categori</th>
                            <th>Harga</th>
                            @if (Auth::user()->role_id == 1)
                                <th>Pemilik</th>
                            @endif
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->count())
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->categori->name }}</td>
                                    <td>Rp {{ $product->harga }}</td>
                                    @if (Auth::user()->role_id == 1)
                                        <td>{{ $product->user->name }}</td>
                                    @endif
                                    <td>
                                        @if ($product->user_id == Auth::user()->id)
                                            <a href="/dashboard/product/detail/{{ $product->id }}"
                                                class="btn btn-primary mb-3">Detail</a>
                                            <a href="/dashboard/product/edit/{{ $product->id }}"
                                                class="btn btn-warning mb-3">Edit</a>
                                        @endif

                                        @if (Auth::user()->role_id == 1 || $product->user_id == Auth::user()->id)
                                            <form action="/dashboard/product/delete/{{ $product->id }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger mb-3"
                                                    onclick="return confirm('Are your sure?')">Delete</button>
                                            </form>
                                        @else
                                            <a href="//https://wa.me/{{ $product->user->no_hp }}"
                                                class="btn btn-outline-primary">
                                                <i class="fab fa-whatsapp"></i> Buy
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="6" class="text-center">Product belum ada</td>
                        @endif
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
