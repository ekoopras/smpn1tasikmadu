@extends('layouts.app')

@section('content')
<!-- MAIN CONTENT -->
<div class="container py-4">
    <div class="row px-0 px-md-0">

        <!-- LEFT CONTENT -->
        <div class="col-lg-8 mb-4 mb-lg-0">


                <div class="row g-4">

                    @foreach ($posts as $post)
    <div class="col-12 col-md-6">

        <article class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden blog-card position-relative">

            <!-- THUMBNAIL -->
            <div class="ratio ratio-16x9">
                <img 
                    src="{{ asset('storage/' . $post->thumbnail) }}"
                    alt="{{ $post->title }}"
                    class="img-fluid object-fit-cover"
                >
            </div>

            <!-- CONTENT -->
            <div class="card-body p-4 d-flex flex-column">

                <h5 class="mb-2">
                    {{ $post->title }}
                </h5>


                <div class="mt-auto pt-3 d-flex justify-content-start gap-2 align-items-center small text-muted">
                    
                    <span class="btn btn-sm text-white rounded-pill" style="background-color: #d97706">
                        <i class="bi bi-person-fill me-1"></i>
                        {{ $post->user->name }}
                    </span>
                    <span class="btn btn-sm text-white rounded-pill" style="background-color: #d97706">
                        {{ $post->category->name ?? 'Uncategorized' }}
                    </span>
                </div>

                <!-- STRETCHED LINK (Card clickable) -->
                <a href="{{ route('blog.show', $post->slug) }}"
                   class="stretched-link"
                   aria-label="Baca {{ $post->title }}">
                </a>

            </div>

        </article>

    </div>
@endforeach


                </div>
                
                

               <div class="mt-5 d-flex justify-content-center gap-3">

    @if ($posts->onFirstPage())
        <span class="btn btn-outline-warning disabled rounded-pill px-4">
            ← Prev
        </span>
    @else
        <a href="{{ $posts->previousPageUrl() }}"
           class="btn text-white rounded-pill px-4" style="background-color: #d97706">
            ← Prev
        </a>
    @endif

    @if ($posts->hasMorePages())
        <a href="{{ $posts->nextPageUrl() }}"
           class="btn text-white rounded-pill px-4" style="background-color: #d97706">
            Next →
        </a>
    @else
        <span class="btn btn-outline-warning disabled rounded-pill px-4">
            Next →
        </span>
    @endif

</div>

                

        </div>



        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                <div class="card-body p-4">

                    <!-- RECENT POSTS -->
                    <h5 class="fw-bold mb-3">Recent Posts</h5>

                    @foreach ($recentPosts as $item)
                        <div class="recent-post d-flex align-items-center mb-3">

                            <img 
                                src="{{ asset('storage/' . $item->thumbnail) }}" 
                                alt="{{ $item->title }}"
                                class="me-3 rounded"
                                width="64"
                                height="64"
                                style="object-fit: cover;"
                            >

                            <div>
                                <a 
                                    href="{{ route('blog.show', $item->slug) }}" 
                                    class="text-decoration-none text-dark fw-semibold small d-block"
                                >
                                    {{ Str::limit($item->title, 100) }}
                                </a>

                                {{-- <small class="text-muted">
                                    {{ $item->created_at->format('d M Y') }}
                                </small> --}}
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4">

                    <!-- CATEGORIES -->
                    <h5 class="fw-bold mb-3">Categories</h5>
                    
                    <ul class="list-unstyled mt-3">
                        @foreach ($categorys as $ct)
                        <li class="d-flex justify-content-between mb-2">{{ $ct->name }} 
                            <span class="badge text-white rounded-pill p-2" style="background-color: #d97706">
                                {{ $ct->posts_count }}
                            </span>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>

        </div>
       
    </div>
</div>
@endsection
