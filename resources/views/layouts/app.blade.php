<!DOCTYPE html>
<html lang="id">
<head>
<!-- SEO Meta Tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SMPN 1 TASIKMADU</title>
<meta name="description" content="sekolah smp di karanganyar terfavorit">

<!-- Keywords (opsional untuk Google, masih berguna untuk beberapa search engine) -->
<meta name="keywords" content="smpn1tasikmadu, sekolah smp di karanganyar terfavorit, smp karanganyar">

<meta name="author" content="SMPN 1 TASIKMADU">

<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">


  <!-- Bootstrap CSS -->
  <link href="{{ asset('asset/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

</head>
<body>


    {{-- Header --}}
    @include('layouts.header')


    {{-- Konten --}}
    <main class="w-full min-h-screen">
        @yield('content')
    </main>


    {{-- Header --}}
    @include('layouts.footer')



<script src="{{ asset('asset/dist/js/bootstrap.bundle.min.js') }}"></script>

<script>
    const btnTop = document.getElementById("backToTop");
    
    btnTop.addEventListener("click", () => {
         window.scrollTo({ top: 0, behavior: "smooth" });
    });
</script>

</body>
</html>