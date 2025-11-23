@extends('layouts.app')

@section('content')

<section class="container mt-4">
<div class="hero-section d-flex align-items-center">
    <div class="container text-center text-white">
        <h1 class="display-6 fw-bold m-0">{{ $title }}</h1>
    </div>
</div>
</section>

<div class="container py-5">
    <div class="row">
        @foreach($youtubes as $yt)
            <div class="col-md-4 mb-4">
                <div class="card position-relative">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ $yt->thumbnail }}" class="card-img-top" alt="{{ $yt->title }}">
                        
                        <!-- Simple YouTube Play Button -->
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <svg width="80" height="80" viewBox="0 0 98 98">
                                    <circle cx="49" cy="49" r="49" fill="red"/>
                                    <polygon points="38,28 38,70 70,49" fill="white"/>
                                </svg>
                        </div>

                        <a href="{{ $yt->url }}" target="_blank" class="stretched-link"></a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $yt->title }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection