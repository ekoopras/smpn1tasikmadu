<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sticky Header + Mobile Slide Left</title>

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