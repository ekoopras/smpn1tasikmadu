@extends('layouts.app')

@section('content')

<section class="container mt-4">
<div class="hero-section d-flex align-items-center">
    <div class="container text-center text-white">
        <h1 class="display-6 fw-bold m-0">{{ $title }}</h1>
    </div>
</div>
</section>

<!-- Blog Section Alternative -->
<section class="py-5">
    <div class="container">
       

        <div class="row g-4">
            <!-- Blog Post 1 -->
        @foreach($posts as $post)
            
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="#" class="card border-1 h-100 shadow-hover text-decoration-none text-dark">
                <article>
                    <div class="card-img-wrapper overflow-hidden">
                        @if($post->thumbnail)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="card-img-top">
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-primary bg-opacity-10 text-primary">{{ $post->category->name ?? 'Uncategorized' }}</span>
                            
                        </div>
                        <h6 class="card-title fw-bold">{{ $post->title }}</h6>
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <div class="d-flex align-items-center">
                                
                                <small class="text-muted">Admin</small>
                            </div>
                        
                        </div>
                    </div>
                </article>
                </a>
            </div>
        @endforeach

        </div>
    </div>
</section>

<style>
.shadow-hover {
    transition: all 0.3s ease;
    border-radius: 10px;
}

.shadow-hover:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12) !important;
}

.card-img-wrapper {
    height: 180px;
    overflow: hidden;
}

.card-img-wrapper img {
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.shadow-hover:hover .card-img-wrapper img {
    transform: scale(1.1);
}
</style>

@endsection
