@extends('dashboard.layouts.main')

@section('title', 'Workshop')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h1 class="text-center mb-5">
                Selamat datang dihalaman workshop👋
            </h1>


            <div class="d-flex justify-content-center my-4">
                @if (Session::has('success'))
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ Session('success') }}
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between my-4">
                @if (Auth::user()->role_id == 1)
                    <a href="/dashboard/workshop/add" class="btn btn-primary">Add Data</a>
                @endif
                <a href="/dashboard/workshop-belajar/{{ Auth::user()->id }}" class="btn btn-success">Belajar</a>
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

            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workshops as $workshop)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $workshop->title }}</td>
                                <td>
                                    @if ($workshop->pendaftaran_workshop->count())
                                        
                                    @else 
                                    <a href="/dashboard/workshop/daftar/{{ $workshop->id }}"class="btn btn-success mb-3">
                                        Daftar
                                    </a>
                                    @endif
                                    <a href="/dashboard/workshop/detail/{{ $workshop->id }}" class="btn btn-primary mb-3">
                                        detail
                                    </a>
                                    @if (Auth::user()->role_id == 1)
                                        <form action="/dashboard/workshop/delete/{{ $workshop->id }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger mb-3" onclick="return confirm('Are your sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $workshops->links() }}
            </div>
        </div>
    </section>

@endsection
