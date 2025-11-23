<!-- ========== TOPBAR ========== -->
<div class="topbar py-2">
  <div class="container d-flex justify-content-between">
    <!-- LEFT -->
    <div class="d-flex gap-4">
      <div class="contact"><i class="bi bi-telephone me-1"></i> 91 458 654 528</div>
      <div class="contact"><i class="bi bi-envelope me-1"></i> info@example.com</div>
    </div>

    <!-- RIGHT -->
    <div class="d-flex gap-3">
      <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
      <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
      <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
      <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>

    </div>
  </div>
</div>

<!-- ========== NAVBAR (STICKY) ========== -->
<div class="header-sticky">
<nav class="navbar navbar-expand-lg bg-white py-3">
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
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Desktop Menu -->
    <div class="collapse navbar-collapse" id="mainNav">

      <!-- MENU DIPINDAH KE KANAN -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-4 gap-3"> 
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="bi bi-house-fill"></i> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('visi-misi') }}"><i class="bi bi-star-fill"></i> Visi & Misi</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person-lines-fill"></i> Profil
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('blog.show', 'selayang-pandang') }}">Selayang Pandang</a></li>
            <li><a class="dropdown-item" href="{{ route('blog.show', 'profil-kepala-sekolah') }}">Profil Kepala Sekolah</a></li>
            <li><a class="dropdown-item" href="{{ route('guru') }}">Tenaga Pendidikan</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}"><i class="bi bi-sticky-fill"></i> Berita Terbaru</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-megaphone-fill"></i> Kontak</a></li>
      </ul>

      <!-- Right Icons -->
      <div class="d-flex align-items-center gap-3">
        <a href="#" class="btn btn-primary btn-lg mt-2">
          <i class="bi bi-box-arrow-in-right"></i> Login
        </a>
      </div>

    </div>
  </div>
</nav>
</div>


<!-- ========== OFFCANVAS MOBILE (slide from left) ========== -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
  
    <div class="offcanvas-body">
  
      <ul class="navbar-nav">
  
        <!-- HOME DROPDOWN -->
        <li class="nav-item">
          <a class="nav-link d-flex justify-content-between align-items-center"
             data-bs-toggle="collapse" href="#mobileHome">
            Home
            <i class="bi bi-chevron-down"></i>
          </a>
          <div class="collapse ms-3" id="mobileHome">
            <a class="nav-link" href="#">Home 1</a>
            <a class="nav-link" href="#">Home 2</a>
          </div>
        </li>
  
        <!-- COURSES DROPDOWN -->
        <li class="nav-item mt-2">
          <a class="nav-link d-flex justify-content-between align-items-center"
             data-bs-toggle="collapse" href="#mobileCourses">
            Courses
            <i class="bi bi-chevron-down"></i>
          </a>
          <div class="collapse ms-3" id="mobileCourses">
            <a class="nav-link" href="#">Course List</a>
            <a class="nav-link" href="#">Course Detail</a>
          </div>
        </li>
  
        <!-- PAGES DROPDOWN -->
        <li class="nav-item mt-2">
          <a class="nav-link d-flex justify-content-between align-items-center"
             data-bs-toggle="collapse" href="#mobilePages">
            Pages
            <i class="bi bi-chevron-down"></i>
          </a>
          <div class="collapse ms-3" id="mobilePages">
            <a class="nav-link" href="#">About</a>
            <a class="nav-link" href="#">FAQ</a>
          </div>
        </li>
  
        <!-- SHOP DROPDOWN -->
        <li class="nav-item mt-2">
          <a class="nav-link d-flex justify-content-between align-items-center"
             data-bs-toggle="collapse" href="#mobileShop">
            Shop
            <i class="bi bi-chevron-down"></i>
          </a>
          <div class="collapse ms-3" id="mobileShop">
            <a class="nav-link" href="#">Shop</a>
            <a class="nav-link" href="#">Cart</a>
          </div>
        </li>
  
        <li class="nav-item mt-2">
          <a class="nav-link" href="#">Blog</a>
        </li>
  
        <li class="nav-item mt-2">
          <a class="nav-link" href="#">Contact</a>
        </li>

        <li>
        <a href="#" class="btn btn-primary btn-lg mt-2">Login</a>
        </li>
  
      </ul>
  
    </div>
</div>