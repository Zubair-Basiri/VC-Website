<!DOCTYPE html>
<html lang="en">

<head>
  <title>VC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{ asset('images/VCLogo.png') }}" type="image/png">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.css"') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">

  <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

  <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
  <link href="{{ asset('css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">
    @yield('header')
    @yield('content')
    @yield('footer')

  </div>

  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('js/jquery.sticky.js') }}"></script>
  <script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 2000,
    easing: "ease-in-out",    // animation speed
    once: false,       // false = animate every time you scroll down to the element
    mirror: true      // true = animate when scrolling back up too
});
</script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
  const lightbox = GLightbox({
    selector: '.glightbox'
  });
</script>
<script>
  function toggleDescription(id, link) {
    const desc = document.getElementById(id);
    desc.classList.toggle('collapsed-text');
    link.textContent = desc.classList.contains('collapsed-text') ? 'See More' : 'See Less';
  }
</script>

  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>