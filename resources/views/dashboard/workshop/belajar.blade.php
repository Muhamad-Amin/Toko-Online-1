@extends('dashboard.layouts.main')

@section('title', 'Workshop Belajar')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h1 class="text-center">Selamat Belajar😊</h1>

            <div class="table-responsive text-center mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($workshops->count())
                            @foreach ($workshops as $workshop)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $workshop->workshop->title }}</td>
                                    <td>
                                        <a href="/dashboard/workshop/belajar/{{ $workshop->workshop->id }}"
                                            class="btn btn-success">
                                            Belajar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Tidak ada workshop yang diikuti</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <a href="/dashboard/workshops/{{ Auth::user()->id }}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </section>

@endsection
