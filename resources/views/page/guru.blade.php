@extends('layouts.app')

@section('content')

<section class="container mt-4">
<div class="hero-section d-flex align-items-center">
    <div class="container text-center text-white">
        <h1 class="display-6 fw-bold m-0">{{ $title }}</h1>
    </div>
</div>
</section>

<section class="py-5">
    <div class="container">

        <div class="row g-4 justify-content-center">
            @foreach ($gurus as $guru)

            <!-- CARD 1 -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-1 text-center">
                    <img src="{{ asset('storage/' . $guru->image) }}" class="card-img-top" alt="Guru">
                    <div class="card-body">
                        <h5 class="fw-bold mb-1">{{ $guru->name }}</h5>
                        <p class="text-primary fw-semibold mb-1">{{ $guru->jabatan }}</p>
                        <p class="text-muted">{{ $guru->guru }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


@endsection