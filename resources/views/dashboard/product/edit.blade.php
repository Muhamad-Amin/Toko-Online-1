@extends('dashboard.layouts.main')

@section('title', 'Edit Product')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center mb-5">Edit Product {{ $product->name }}</h2>

            <div class="col-lg-8 offset-lg-2">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}"
                            autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" id="harga"
                            class="form-control @error('harga') is-invalid @enderror" value="{{ $product->harga }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="categori" class="form-label">Categori</label>
                        <select name="categori_id" id="categori"
                            class="form-control @error('categori_id') is-invalid @enderror">
                            <option value="{{ $product->categori->id }}">{{ $product->categori->name }}</option>
                            @foreach ($categories as $categori)
                                <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="imageOld" class="form-label">Image old</label>
                        <div class="col-lg-5 offset-lg-3">
                            @if ($product->image)
                                <input type="hidden" name="oldImage" value="{{ $product->image }}">
                                <img src="{{ asset('storage/photo/' . $product->image) }}" class="img-thumbnail"
                                    alt="{{ $product->name }}">
                            @else
                                <input type="hidden" name="oldImage" value="">
                                <img src="{{ asset('img/notFound.jpeg') }}" class="img-thumbnail"
                                    alt="{{ $product->name }}">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image now <span class="text-danger">option</span></label>
                        <input type="file" name="foto" id="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="describe" class="form-label">Describe</label>
                        <input type="hidden" id="describe" name="describe" value="{{ $product->describe }}">
                        <trix-editor input="describe"></trix-editor>
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/dashboard/products/{{ Auth::user()->id }}" class="btn btn-danger">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
