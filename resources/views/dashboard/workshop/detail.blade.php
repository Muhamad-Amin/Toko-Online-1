@extends('dashboard.layouts.main')

@section('title', 'Detail workshop')

@section('content')

    <section class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="mb-5">Detail work shop {{ $workshop->title }}</h2>

            <p>pada workshop ini anda akan mempelajari tentang {{ $excerpt }}</p>

            <p>untuk lebih lengkapnya silahkan
                <a href="/dashboard/workshop/daftar/{{ $workshop->id }}">daftar</a>
            </p>
        </div>
    </section>

@endsection
