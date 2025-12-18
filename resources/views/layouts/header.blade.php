<!-- ========== TOPBAR ========== -->
<div class="topbar py-1">
    <div class="container d-flex justify-content-between">

        <!-- LEFT -->
        <div class="d-flex gap-4">

            {{-- <!-- PHONE -->
            @if (!empty($setting->phone))
                <div class="contact">
                    <i class="bi bi-telephone me-1"></i>{{ $setting->phone }}
                </div>
            @endif --}}

            <!-- EMAIL -->
            @if (!empty($setting->email))
                <div class="contact">
                    <i class="bi bi-envelope me-1"></i>{{ $setting->email }}
                </div>
            @endif

        </div>

        <!-- RIGHT (SOCIAL ICONS) -->
        <div class="d-flex gap-3">

            @if (!empty($setting->facebook))
                <a href="{{ $setting->facebook }}" target="_blank" class="text-white">
                    <i class="bi bi-facebook"></i>
                </a>
            @endif

            @if (!empty($setting->youtube))
                <a href="{{ $setting->youtube }}" target="_blank" class="text-white">
                    <i class="bi bi-youtube"></i>
                </a>
            @endif

            @if (!empty($setting->instagram))
                <a href="{{ $setting->instagram }}" target="_blank" class="text-white">
                    <i class="bi bi-instagram"></i>
                </a>
            @endif

            @if (!empty($setting->whatsapp))
                <a href="https://wa.me/{{ $setting->whatsapp }}" target="_blank" class="text-white">
                    <i class="bi bi-whatsapp"></i>
                </a>
            @endif

        </div>

    </div>
</div>


<style>
    /* TOP BAR */
    .topbar {
        background-color: #d97706;
        color: white;
        font-size: 14px;
    }
</style>

<!-- ========== NAVBAR (STICKY) ========== -->
<div class="header-sticky">
    <nav class="navbar navbar-expand-lg bg-white py-1">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand fw-bold fs-3" href="#">
                @if (!empty($setting) && $setting->logo)
                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" height="40" class="me-2">
                @else
                    <span class="text-2xl font-bold text-blue-600">
                        {{ $setting->site_name ?? 'SMPN 1 Tasikmadu' }}
                    </span>
                @endif
            </a>

            <!-- Mobile Toggler -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- Desktop Menu -->
            <div class="collapse navbar-collapse" id="mainNav">

                <!-- MENU DIPINDAH KE KANAN -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-4 gap-3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="bi bi-house-fill"></i>
                            Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('page.show', 'visi-misi') }}"><i
                                class="bi bi-star-fill"></i> Visi & Misi</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-lines-fill"></i> Profil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-light"
                                    href="{{ route('page.show', 'selayang-pandang') }}">Selayang Pandang</a></li>
                            <li><a class="dropdown-item fw-light"
                                    href="{{ route('page.show', 'profil-kepala-sekolah') }}">Profil Kepala Sekolah</a>
                            </li>
                            <li><a class="dropdown-item fw-light" href="{{ route('guru') }}">Tenaga Pendidikan</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}"><i
                                class="bi bi-sticky-fill"></i> Berita Terbaru</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-megaphone-fill"></i>
                            Kontak</a></li>
                </ul>

                <!-- Right Icons -->
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="btn btn-md mt-2" style="background-color: #d97706; color: white;">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </div>

            </div>
        </div>
    </nav>
</div>

<style>
    /* NAVBAR */
    .nav-link i {
        font-size: 14px;
        margin-left: 4px;
        color: #6e6e6e;
    }

    .navbar-nav .nav-link {
        font-size: 15px;
        /* default Bootstrap 16px → dikecilkan */
        padding-top: 4px;
        padding-bottom: 4px;
        color: #666666;
    }

    .header-sticky {
        position: sticky;
        top: 0;
        z-index: 1030;
        background: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    /* Hover warna */
    .navbar .nav-link:hover {
        color: #d97706;
        /* Primary */
    }

    /* Dropdown container */
    .dropdown-menu {
        border-radius: 12px;
        padding: 10px;
        border: none;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.15);
        animation: fadeIn 0.15s ease-in-out;
    }

    /* Dropdown item */
    .dropdown-item {
        padding: 10px 15px;
        font-weight: 500;
        border-radius: 8px;
        transition: 0.2s;
    }

    /* Hover item */
    .dropdown-item:hover {
        background-color: #eef4ff;
        color: #d97706;
    }

    /* Animasi muncul */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .navbar-toggler,
    .navbar-toggler:focus,
    .navbar-toggler:active,
    .navbar-toggler:focus-visible {
        border: none !important;
        box-shadow: none !important;
        outline: none !important;
    }
</style>


<!-- ========== OFFCANVAS MOBILE (slide from left) ========== -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="bi bi-house-fill me-2"></i> Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('visi-misi') }}">
                    <i class="bi bi-star-fill me-2"></i> Visi & Misi
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#profilMenu">
                    <i class="bi bi-person-lines-fill me-2"></i> Profil
                </a>
                <ul class="collapse ps-4" id="profilMenu">
                    <li><a class="nav-link" href="{{ route('blog.show', 'selayang-pandang') }}">• Selayang
                            Pandang</a></li>
                    <li><a class="nav-link" href="{{ route('blog.show', 'profil-kepala-sekolah') }}">• Profil Kepala
                            Sekolah</a></li>
                    <li><a class="nav-link" href="{{ route('guru') }}">• Tenaga Pendidikan</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.index') }}">
                    <i class="bi bi-sticky-fill me-2"></i> Berita Terbaru
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-megaphone-fill me-2"></i> Kontak
                </a>
            </li>
        </ul>

        <div class="mt-4">
            <a href="#" class="btn w-100" style="background-color: #d97706; color: white;">
                <i class="bi bi-box-arrow-in-right me-2"></i> Login
            </a>
        </div>

    </div>
</div>

<style>
    /* Style menu mobile */

    #mobileMenu {
        width: 280px;
    }

    .offcanvas-body .nav-link {
        font-size: 1rem;
        font-weight: 500;
        padding: 12px 0;
        color: #333;
    }

    /* Hover */
    .offcanvas-body .nav-link:hover {
        color: #d97706;
    }

    /* Dropdown mobile background area */
    #mobileCourses {
        margin-left: 12px;
        border-left: 2px solid #0d6efd;
        padding-left: 10px;
        margin-top: 5px;
    }

    /* Link dalam dropdown */
    #mobileCourses .nav-link {
        font-size: 0.95rem;
        font-weight: 400;
        padding: 8px 0;
    }

    /* Animasi icon rotate */
    .rotate {
        transition: transform 0.25s ease;
    }

    .rotate.open {
        transform: rotate(180deg);
    }

    /* Tombol login lebih besar */
    .mobile-login-btn {
        width: 100%;
        font-size: 1.1rem;
        padding: 10px;
    }
</style>
