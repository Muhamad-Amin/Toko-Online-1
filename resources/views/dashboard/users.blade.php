@extends('dashboard.layouts.main')

@section('title', 'Users Control')

@section('content')


    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center">Selamat datang dihalaman users</h2>

            <div class="d-flex justify-content-center">
                @if (Session::has('success'))
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ Session('success') }}
                    </div>
                @endif
            </div>

            <div class="my-5">
                <h2 class="text-center mb-5">User List</h2>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <form action="/dashboard/user/{{ $user->id }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" onclick="return confirm('Are your sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
