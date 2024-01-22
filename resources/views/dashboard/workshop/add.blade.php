@extends('dashboard.layouts.main')

@section('title', 'Add Workshop')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center mb-5">Halaman add data workshop</h2>

            <div class="col-lg-8 offset-lg-2">
                <form action="" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}"
                            autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">content</label>
                        <input type="hidden" id="content" name="content" value="{{ old('content') }}" required>
                        <trix-editor input="content"></trix-editor>
                    </div>

                    <div class="mb-3">
                        <label for="penutup" class="form-label">penutup</label>
                        <input type="hidden" id="penutup" name="penutup" value="{{ old('content') }}">
                        <trix-editor input="penutup"></trix-editor>
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-danger" onclick="return confirm('Are your sure?')">
                            Reset
                        </button>
                        <a href="/dashboard/workshops/{{ Auth::user()->id }}" class="btn btn-primary">
                            Back
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
