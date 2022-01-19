<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.front._head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
   
  @include('layouts.front._header')
  </header><!-- End Header -->
    @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
  @include('layouts.front._footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @include('layouts.front._script')

</body>

</html>