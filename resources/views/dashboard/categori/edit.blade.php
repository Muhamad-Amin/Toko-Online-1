@extends('dashboard.layouts.main')

@section('title', 'Edit Categori')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center mb-5">Edit categori {{ $categori->name }}</h2>

            <div class="col-lg-8 offset-lg-2">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $categori->name }}" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="imageOld" class="form-label">Image Old</label>
                        <div class="col-lg-5 offset-lg-3">
                            @if ($categori->image)
                                <input type="hidden" name="oldImage" value="{{ $categori->image }}">
                                <img src="{{ asset('storage/photo/' . $categori->image) }}" class="img-thumbnail"
                                    alt="{{ $categori->name }}">
                            @else
                                <input type="hidden" name="oldImage" value="">
                                <img src="{{ asset('img/notFound.jpeg') }}" class="img-thumbnail"
                                    alt="{{ $categori->name }}">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image Now <span class="text-danger">option</span></label>
                        <input type="file" name="foto" id="image" class="form-control">
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/dashboard/categories/1" class="btn btn-danger">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
