@extends('dashboard.layouts.main')

@section('title', 'Belajar Workshop')

@section('content')

    <section class="container-fluid py-5">
        <div class="container text-center">
            <h1>{{ $workshop->title }}</h1>

            <p class="my-3">
                {!! $workshop->content !!}
            </p>

            <p>
                {!! $workshop->penutup !!}
            </p>

            <div class="d-flex justify-content-between">
                <a href="/dashboard/workshop-belajar/{{ Auth::user()->id }}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </section>

@endsection
