@extends('dashboard.layouts.main')

@section('title', 'Categori')

@section('content')

    <section class="container-fluid py-5">
        <div class="container text-center">
            <h1 class="">Selamat datang di halaman Categori</h1>

            <div class="d-flex justify-content-center">
                @if (Session::has('success'))
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ Session('success') }}
                    </div>
                @endif
            </div>

            <div class="my-5">
                <h4>Categori List</h4>
                <div class="d-flex justify-content-between my-4">
                    <a href="/dashboard/categori/add" class="btn btn-primary">Add Data</a>
                    <div class="col-lg-4">
                        <form action="" method="get">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Serach"
                                    autocomplete="off">
                                <button class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->count())
                                @foreach ($categories as $categori)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $categori->name }}</td>
                                        <td>
                                            <a href="/dashboard/categori/detail/{{ $categori->id }}"
                                                class="btn btn-primary mx-2 mb-3">Detail</a>
                                            <a href="/dashboard/categori/edit/{{ $categori->id }}"
                                                class="btn btn-warning mx-2 mb-3">Edit</a>
                                            <form action="/dashboard/categori/delete/{{ $categori->id }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are you sure?')"
                                                    class="btn btn-danger mx-2 mb-3">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="3" class="text-center">Categori belum tersedia</td>
                            @endif
                        </tbody>
                    </table>
                    <div class="">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
