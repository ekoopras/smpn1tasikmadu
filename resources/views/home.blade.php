@extends('layouts.app')

@section('content')
    <!-- JUMBOTRON + SLIDESHOW -->
    <section class="hero-section-jumbotron py-7">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT: Slideshow -->
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">

                            @foreach ($slides as $slide)
                                <div class="carousel-item @if ($loop->first) active @endif"
                                    data-index="{{ $loop->index }}">
                                    <img src="{{ asset('storage/' . $slide->image_path) }}" alt="{{ $slide->title }}"
                                        class="d-block w-100 hero-img rounded shadow">
                                </div>
                            @endforeach

                        </div>

                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>

                    </div>
                </div>

                <!-- RIGHT: Text -->
                <div class="col-lg-5 text-white">
                    <div class="hero-text-wrapper">

                        @foreach ($slides as $slide)
                            <div class="hero-text d-none" data-slide-index="{{ $loop->index }}">
                                <h1 class="hero-title">{{ $slide->title }}</h1>
                                <p class="hero-subtitle">{{ $slide->caption }}</p>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section>

    <style>
        .hero-text {
            opacity: 0;
            transform: translateX(40px);
            transition: all .6s ease;
        }

        .hero-text.active {
            opacity: 1;
            transform: translateX(0);
        }

        /* WRAPPER */
        .hero-section-jumbotron {
            position: relative;
            min-height: 40px;
            display: flex;
            align-items: center;
            padding: 40px 0 150px;
            overflow: hidden;
        }

        /* GRADIENT ORANGE (FULL COLOR) */
        .hero-section-jumbotron::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(296deg,
                    #c45d13 0%,
                    #edb61e 100%);
            z-index: 0;
        }

        /* IMAGE TEXTURE */
        .hero-section-jumbotron::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("https://www.amikomsolo.ac.id/wp-content/uploads/2023/07/geometic-bg-white.jpg");
            background-size: cover;
            background-position: center;
            mix-blend-mode: multiply;
            /* 👈 kunci */
            z-index: 1;
        }

        /* KONTEN */
        .hero-section-jumbotron>* {
            position: relative;
            z-index: 2;
        }

        /* MOBILE */
        .hero-img {
            width: 100%;
            height: 270px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* DESKTOP */
        @media (min-width: 992px) {
            .hero-img {
                height: 350px;
            }
        }

        /* Text styling */
        .hero-title {
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: -0.02em;
            margin-bottom: 12px;
        }

        .hero-subtitle {
            font-size: clamp(15px, 1.5vw, 18px);
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.9);
            max-width: 520px;
        }


        /* Carousel arrows color fix */
        .hero-carousel .carousel-control-prev-icon,
        .hero-carousel .carousel-control-next-icon {
            filter: invert(1);
        }

        .hero-text-wrapper {
            position: relative;
            min-height: 200px;
        }

        .hero-text {
            position: absolute;
            inset: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const texts = document.querySelectorAll('.hero-text');
            const carousel = document.getElementById('heroCarousel');

            function updateText() {
                const activeItem = carousel.querySelector('.carousel-item.active');
                const index = activeItem.getAttribute('data-index');

                // sembunyikan semua
                texts.forEach(t => {
                    t.classList.remove('active');
                    t.classList.add('d-none');
                });

                // tampilkan text yg sesuai
                const currentText = document.querySelector(`.hero-text[data-slide-index="${index}"]`);
                if (currentText) {
                    currentText.classList.remove('d-none');

                    // trigger animasi geser
                    setTimeout(() => {
                        currentText.classList.add('active');
                    }, 10);
                }
            }

            // awal
            updateText();

            // ketika slide berubah
            carousel.addEventListener('slid.bs.carousel', updateText);

        });
    </script>
    <!-- END - JUMBOTRON + SLIDESHOW -->


    <!-- SECTION GRADIENT + CARDS -->
    <section class="promo-single">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card promo-card border-0 shadow">
                        <div class="row g-4 align-items-center">

                            @if ($medias)
                                <div class="col-md-auto text-center">
                                    <img src="{{ $medias->file_url }}" alt="{{ $medias->title }}"
                                        class="promo-img img-fluid rounded-3">
                                </div>
                            @endif

                            <div class="col">
                                <div class="card-body p-0">
                                    <h5 class="card-title fw-bold">
                                        Sambutan Kepala Sekolah
                                    </h5>
                                    <p class="card-text text-muted mb-0">
                                        Selamat datang di website resmi SMPN 1 TASIKMADU<br>
                                        website ini dibuat untuk memudahkan akses informasi ke sekolah kami
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <style>
        .promo-single {
            margin-top: -90px;
            position: relative;
            z-index: 10;
        }

        .promo-card {
            border-radius: 18px;
            padding: 25px;
        }

        .promo-img {
            width: 220px;
        }
    </style>
    <!-- END SECTION GRADIENT + CARDS -->

    <!-- SECTION MENU APPS -->
    <section class="portal-layanan py-4">
        <div class="container">

            <div class="row g-3 justify-content-center">

                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="portal-item text-center">
                        <i class="bi bi-envelope-open"></i>
                        <span>Pengaduan</span>
                    </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="portal-item text-center">
                        <i class="bi bi-person-gear"></i>
                        <span>Layanan Public</span>
                    </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="portal-item text-center">
                        <i class="bi bi-pencil"></i>
                        <span>Survey Kepuasan</span>
                    </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="portal-item text-center">
                        <i class="bi bi-megaphone"></i>
                        <span>Pengumuman</span>
                    </a>
                </div>


            </div>

        </div>
    </section>
    <style>
        .portal-item {
            background: #d97706;
            width: 100%;
            height: 140px;
            border-radius: 22px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            transition: transform .2s ease;
        }

        .portal-item i {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .portal-item span {
            font-size: 15px;
            font-weight: 600;
        }

        .portal-item:hover {
            transform: translateY(-4px);
        }
    </style>
    <!-- END SECTION MENU APPS -->


    <!-- SECTION BLOG GRID -->
    <section class="py-5">
        <div class="container">

            <!-- TITLE AREA -->
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Berita Terbaru</h2>
                    <p class="text-muted mb-0" style="font-size: 0.95rem;">
                        Update informasi terbaru setiap hari.
                    </p>
                </div>

                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                    Lihat Semua
                </a>
            </div>

            <!-- HORIZONTAL SCROLL -->
            <div class="blog-scroll-wrapper d-flex gap-3 overflow-auto pb-3">

                @foreach ($posts as $post)
                    <div class="blog-card-item">

                        <article
                            class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden blog-card position-relative">

                            <!-- THUMBNAIL -->
                            <div class="ratio ratio-16x9">
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                    class="img-fluid object-fit-cover">
                            </div>

                            <!-- CONTENT -->
                            <div class="card-body p-4 d-flex flex-column">

                                <h5 class="mb-2">
                                    {{ $post->title }}
                                </h5>


                                <div
                                    class="mt-auto pt-3 d-flex justify-content-start gap-2 align-items-center small text-muted">

                                    <span class="btn btn-sm text-white rounded-pill" style="background-color: #d97706">
                                        <i class="bi bi-person-fill me-1"></i>
                                        {{ $post->user->name }}
                                    </span>
                                    <span class="btn btn-sm text-white rounded-pill" style="background-color: #d97706">
                                        {{ $post->category->name ?? 'Uncategorized' }}
                                    </span>
                                </div>

                                <!-- STRETCHED LINK (Card clickable) -->
                                <a href="{{ route('blog.show', $post->slug) }}" class="stretched-link"
                                    aria-label="Baca {{ $post->title }}">
                                </a>

                            </div>

                        </article>

                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <style>
        .blog-card-item {
            flex: 0 0 300px;
            /* lebar card */
        }

        @media (min-width: 480px) {
            .blog-card-item {
                flex: 0 0 350px;
            }
        }

        @media (min-width: 1200px) {
            .blog-card-item {
                flex: 0 0 350px;
            }
        }

        .blog-card h6 {
            line-height: 1.4;
        }
    </style>

    <!-- END BLOG GRID-->


    <!-- SECTION YOUTUBE -->
    <section class="py-5">
        <div class="container">

            <!-- TITLE + LINK -->
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Vlog Terbaru</h2>
                    <p class="text-muted mb-0" style="font-size: 0.95rem;">
                        Update Vlog terbaru setiap hari.
                    </p>
                </div>

                <a href="{{ route('youtube-list') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                    Lihat Semua
                </a>
            </div>

            <!-- SCROLL WRAPPER -->
            <div class="video-scroll-wrapper d-flex gap-4 overflow-auto pb-3">

                @foreach ($youtubes as $yt)
                    <div class="card video-card border-0 shadow-sm flex-shrink-0" style="width: 320px;">

                        <!-- Thumbnail Wrapper -->
                        <div class="video-thumb position-relative rounded overflow-hidden">

                            <img src="{{ $yt->thumbnail }}" class="w-100" alt="{{ $yt->title }}">

                            <!-- DARK OVERLAY GRADIENT -->
                            <div class="video-overlay"></div>

                            <!-- Play Button -->
                            <div class="video-play-btn position-absolute top-50 start-50 translate-middle">
                                <svg width="72" height="72" viewBox="0 0 98 98">
                                    <circle cx="49" cy="49" r="49" fill="rgba(255,0,0,0.9)" />
                                    <polygon points="38,28 38,70 70,49" fill="white" />
                                </svg>
                            </div>

                            <a href="{{ $yt->url }}" target="_blank" class="stretched-link"></a>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <h6 class="fw-bold video-title mb-0">
                                {{ Str::limit($yt->title, 70) }}
                            </h6>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <style>
        .video-card {
            border-radius: 18px;
            overflow: hidden;
            transition: .3s ease;
        }

        .video-thumb img {
            height: 180px;
            object-fit: cover;
            transition: transform .35s ease;
        }

        /* Card Hover */
        .video-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
        }

        .video-card:hover img {
            transform: scale(1.07);
        }

        /* Gradient Overlay */
        .video-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.35));
        }

        /* Title max 2 lines */
        .video-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.3;
            font-size: 0.95rem;
        }
    </style>
    <!-- END VIDEO YOUTUBE -->
@endsection
