@extends('layouts.app')

@section('content')

<!-- SLIDESHOW -->
<div class="relative w-full max-w-4xl mx-auto mt-10">
    <div class="overflow-hidden relative h-64 rounded-xl shadow-lg">
        @foreach ($slides as $slide)
        <!-- Slide 1 -->
        <div class="slide absolute inset-0 opacity-100">
            <img
                src="{{ asset('storage/' . $slide->image_path) }}"
                alt="{{ $slide->title }}" 
                class="w-full h-full object-cover">
        </div> 
        @if ($slide->title || $slide->caption)
            <div class="absolute bottom-0 bg-black/50 text-white p-4">
                <h3>{{ $slide->title }}</h3>
                <p>{{ $slide->caption }}</p>
            </div>
        @endif      
        @endforeach
    </div>


    <!-- Tombol Prev -->
    <button id="prev"
        class="absolute top-1/2 left-4 -translate-y-1/2 bg-black/40 text-white px-3 py-2 rounded-full">
        ‹
    </button>

    <!-- Tombol Next -->
    <button id="next"
        class="absolute top-1/2 right-4 -translate-y-1/2 bg-black/40 text-white px-3 py-2 rounded-full">
        ›
    </button>
</div>



@endsection
