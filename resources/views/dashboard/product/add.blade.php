@extends('dashboard.layouts.main')

@section('title', 'Add Data Product')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="mb-5 text-center">Add Data Product</h2>

            <div class="col-lg-8 offset-lg-2">
                <form action="/dashboard/product/add" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="off"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" autocomplete="off"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="categori" class="form-label">Categori</label>
                        <select name="categori_id" id="categori" class="form-control" required>
                            @foreach ($categories as $categori)
                                <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="foto" id="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="describe" class="form-label">Describe</label>
                        <input type="hidden" id="describe" name="describe" value="{{ old('describe') }}">
                        <trix-editor input="describe"></trix-editor>
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/dashboard/products/{{ Auth::user()->id }}" class="btn btn-primary">Back</a>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
