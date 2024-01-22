@extends('dashboard.layouts.main')

@section('title', 'Add data Categori')

@section('content')

    <section class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="mb-5">Add Data Categori</h2>

            <div class="col-lg-8 offset-lg-2">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="off"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="foto" id="image" class="form-control">
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/dashboard/categories/1" class="btn btn-primary">Back</a>
                    </div>

                </form>
            </div>

        </div>
    </section>

@endsection
