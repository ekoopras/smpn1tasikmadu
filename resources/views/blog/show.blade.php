@extends('layouts.app')

@section('content')
<!-- MAIN CONTENT -->
<div class="container py-5">
    <div class="row px-3 px-md-0">

        <!-- LEFT CONTENT -->
        <div class="col-lg-8">

            <!-- HEADER IMAGE -->
            

            <!-- META INFO -->
            <div class="d-flex align-items-center gap-3 mb-3 text-muted small">
                <span><i class="bi bi-person-fill text-primary"></i> {{ $post->user->name }}</span>
                <span><i class="bi bi-calendar-event text-primary"></i> {{ $post->created_at->format('d M Y') }}</span>
                <span><i class="bi bi-chat-left-text text-primary"></i> 0 Comments</span>
            </div>

            <!-- TITLE -->
            <h2 class="fw-bold">{{ $post->title }}</h2>

             @if($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                    alt="{{ $post->title }}" 
                    class="img-fluid rounded mb-4" 
                >
            @endif

            <!-- CONTENT -->
            <p class="mt-3">
                {!! $post->content !!}
            </p>

        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4 ps-lg-5">

            <!-- SEARCH -->
            <div class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                </div>
            </div>

            <!-- RECENT POSTS -->
            <h5 class="fw-bold mb-3">Recent Posts</h5>

            <div class="recent-post d-flex mb-3">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="me-3">
                <div>
                    <p class="m-0 fw-semibold">
                        {{ implode(' ', array_slice(explode(' ', $post->title), 0, 8)) }}
                            {{ str_word_count($post->title) > 8 ? '...' : '' }}
                    </p>
                    <small class="text-muted"><i class="bi bi-calendar"></i> {{ $post->created_at->format('d M Y') }}</small>
                </div>
            </div>

            <!-- CATEGORIES -->
            <h5 class="fw-bold mt-4">Categories</h5>
            <ul class="list-unstyled mt-3">
                @foreach ($categorys as $ct)
                <li class="d-flex justify-content-between mb-2">{{ $ct->name }} <span>(3)</span></li>
                @endforeach
                
            </ul>

        </div>
    </div>
</div>
@endsection
