@extends('dashboard.layouts.main')

@section('title', 'Detail Categori')

@section('content')

    <section class="container-fluid py-5">
        <div class="container text-center">
            <h2>Detail Categori {{ $categori->name }}</h2>

            <div class="d-flex justify-content-center my-5">
                <div class="col-lg-3 col-md-5 col-sm-8">
                    @if ($categori->image == null)
                        <div class="card">
                            <img src="{{ asset('img/notFound.jpeg') }}" alt="{{ $categori->name }}" alt="{{ $categori->name }}"
                                class="img-thumbnail">
                        </div>
                    @else
                        <div class="card">
                            <img src="{{ asset('storage/photo/' . $categori->image) }}" alt="{{ $categori->name }}"
                                class="img-thumbnail">
                        </div>
                    @endif
                </div>
            </div>

            {{-- Product List Start --}}
            <div class="">
                <h4>List Product</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Pemilik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categori->product->count())
                                @foreach ($categori->product as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->user->name }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="3" class="text-center">Product belum ada</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Product List End --}}

        </div>
    </section>


@endsection
