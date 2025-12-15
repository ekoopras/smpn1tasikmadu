@extends('layouts.app')

@section('content')
<!-- MAIN CONTENT -->
<div class="container py-4">
    <div class="row px-0 px-md-0">

        <!-- LEFT CONTENT -->
<div class="col-lg-8 mb-4 mb-lg-0">

    <article class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="card-body p-3 p-md-4 p-lg-5">

            <!-- TITLE -->
            <h1 class="fw-bold mb-3">
                {{ $post->title }}
            </h1>

            <hr class="mb-4">

            <!-- META INFO -->
            <div class="d-flex flex-wrap align-items-center gap-3 mb-4 text-muted small">
                <span>
                    <i class="bi bi-person-fill text-primary me-1"></i>
                    {{ $post->user->name }}
                </span>

                {{-- <span>
                    <i class="bi bi-calendar-event text-primary me-1"></i>
                    {{ $post->created_at->format('d M Y') }}
                </span> --}}

                <span>
                    <i class="bi bi-chat-left-text text-primary me-1"></i>
                    0 Comments
                </span>
            </div>

            <!-- THUMBNAIL -->
        @if($post->thumbnail)
            <img 
                src="{{ asset('storage/' . $post->thumbnail) }}" 
                alt="{{ $post->title }}" 
                class="img-fluid rounded mb-4"
                style="object-fit: cover;"
            >
        @endif

            <!-- CONTENT -->
            <div class="post-content fs-6 lh-lg">
                {!! $post->content !!}
            </div>

        </div>
    </article>

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

<style>
    /* ===== POST CONTENT (RICH EDITOR) ===== */
.post-content img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 1.5rem auto;
    border-radius: 12px;
}

.post-content iframe,
.post-content video {
    max-width: 100%;
}

.post-content figure {
    margin: 2rem 0;
}

.post-content figcaption {
    text-align: center;
    font-size: 0.875rem;
    color: #6c757d;
}

.post-content p {
    margin-bottom: 1rem;
}

.post-content a img {
    display: block;
    margin: 1.5rem auto;
}
.attachment__caption {
    display: none;
}

</style>
@endsection
