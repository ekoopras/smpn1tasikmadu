@extends('layouts.app')

@section('content')

<!-- =======================
     JUMBOTRON + SLIDESHOW
=========================== -->
<div class="container mt-4">
    <div class="row align-items-center">
  
      <!-- SLIDESHOW -->
      <div class="col-md-12">
        <div id="jumbotronCarousel" class="carousel slide" data-bs-ride="carousel">
  
          <div class="carousel-inner rounded shadow">
            @foreach ($slides as $slide)

            <div class="carousel-item active">
              <img
                src="{{ asset('storage/' . $slide->image_path) }}"
                alt="{{ $slide->title }}" 
                class="d-block w-100 slide-img">
            </div>

            @endforeach 
          </div>
  
          <!-- Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#jumbotronCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#jumbotronCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
  
        </div>
      </div>

    </div>
</div>


<div class="container my-5">
    <div class="row g-4 justify-content-center">

        <div class="col-6 col-md-2 col-lg-2 d-flex justify-content-center">
          <a href="/layanan-publik" class="text-decoration-none">
            <div class="service-box text-center">
                <i class="bi bi-diagram-3"></i>
                <div class="service-title">Layanan Publik</div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-2 col-lg-2 d-flex justify-content-center">
          <a href="/layanan-publik" class="text-decoration-none">
            <div class="service-box text-center">
                <i class="bi bi-diagram-3"></i>
                <div class="service-title">Survey Kepuasan</div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-2 col-lg-2 d-flex justify-content-center">
          <a href="/layanan-publik" class="text-decoration-none">
            <div class="service-box text-center">
                <i class="bi bi-diagram-3"></i>
                <div class="service-title">Layanan Pengaduan</div>
            </div>
          </a>
        </div>
        
    </div>
</div>


<section class="py-5 feature-section">
  <div class="container">
      <div class="row align-items-center">

        <!-- RIGHT: IMAGE -->
          <div class="col-lg-6 text-center position-relative">
              @if($medias)
                  <img src="{{ $medias->file_url }}" alt="{{ $medias->title }}" class="brush-bg position-absolute top-50 start-50 translate-middle" style="width:250px; height:auto;">
              @endif
          </div>

          <!-- LEFT: TEXT -->
          <div class="col-lg-6 mb-4 mb-lg-0">
              <h1 class="fw-bold display-5 mb-4">
                  Sambutan Kepala Sekolah
              </h1>

              <p class="text-muted mb-4">
                  Selamat datang di website resmi SMPN 1 TASIKMADU <br>
                  website ini dibuat untuk memudahkan akses informasi ke sekolah kami
              </p>
          </div>

          

      </div>
  </div>
</section>



<!-- SECTION BLOG -->
  <section class="py-5">
    <div class="container">

        <h2 class="fw-bold mb-4">Berita Terbaru</h2>

        <!-- WRAPPER SCROLL HORIZONTAL -->
        <div class="blog-scroll-wrapper d-flex overflow-auto pb-3">

        @forelse($posts as $post)

            <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none text-dark">
                <div class="card blog-card shadow-sm">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                        class="card-img-top" 
                        alt="" 
                        style="height: 200px; object-fit: cover;">

                    <div class="card-body">
                        <small class="text-muted d-block mb-1">
                            {{ $post->category->name ?? 'Uncategorized' }}
                        </small>

                        <h5 class="card-title mb-0">
                            {{ implode(' ', array_slice(explode(' ', $post->title), 0, 12)) }}
                            {{ str_word_count($post->title) > 12 ? '...' : '' }}
                        </h5>
                    </div>
                </div>
            </a>


            
          @empty
          @endforelse

        </div>
    </div>
</section>
<!-- BLOG END -->


<!-- SECTION YOUTUBE -->
<section class="py-5">
  <div class="container">

      <h2 class="fw-bold mb-4">Video Terbaru</h2>

      <!-- WRAPPER SCROLL HORIZONTAL -->
      <div class="video-scroll-wrapper d-flex overflow-auto pb-3">
        @foreach($youtubes as $yt)

          <!-- VIDEO CARD 1 -->
          <div class="card video-card shadow-sm">
              
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

          @endforeach
          

         

      </div>
  </div>
</section>
<!-- VIDEO YOUTUBE END -->

<!-- SECTION BLOG -->
  <section class="py-5">
    <div class="container">

        <h2 class="fw-bold mb-4">Tenaga Pendidikan</h2>

        <!-- WRAPPER SCROLL HORIZONTAL -->
        <div class="blog-scroll-wrapper d-flex overflow-auto pb-3">

        @forelse($gurus as $guru)

            <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none text-dark">
                <div class="card blog-card shadow-sm">
                    <img src="{{ asset('storage/' . $guru->image) }}" 
                        class="card-img-top" 
                        alt="" 
                        style="height: 200px; object-fit: cover;">

                    <div class="card-body">
                        <small class="text-muted d-block mb-1">
                            {{ $guru->jabatan }}
                        </small>

                        <h5 class="card-title mb-0">
                            {{ $guru->name }}
                        </h5>

                         <small class="text-muted d-block mb-1">
                            {{ $guru->guru }}
                        </small>
                    </div>
                </div>
            </a>
            
          @empty
          @endforelse

        </div>
    </div>
</section>
<!-- BLOG END -->


@endsection
