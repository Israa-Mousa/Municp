<!DOCTYPE html>
<html lang={{ app()->getLocale() }} dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{ asset('image/logblog.png') }}" rel="icon">
        <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>{{$title ? $title .'|' :' ' }}{{ config('app.name') }}</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/ps-icon/style.css') }}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/App/plugins/owl-carousel/assets/owl.carousel.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/Magnific-Popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/revolution/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


</head>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
{{-- <script>
  const swiperBlogs = new Swiper(".mySwiperBlogs", {
    loop: true,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
    },
    slidesPerView: 1,
    navigation: {
      nextEl: ".swiper-button-next-blogs",
      prevEl: ".swiper-button-prev-blogs",
    },
  });
</script> --}}


<body class="ps-loading">

    <div class="header--sidebar"></div>

@include('layouts.header')

 @include('layouts.header_services')



    <main class="ps-main">

        {{-- <x-flash-message /> --}}

        {{ $slot }}

        @include('layouts.sub')
        @include('layouts.footer')
    </main>
    <!-- JS Library-->
    <script type="text/javascript" src="{{ asset('assets/App/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/gmap3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/imagesloaded.pkgd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/jquery.matchHeight-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/slick/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/App/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="{{ asset('assets/App/js/main.js') }}"></script>
</body>

</html>
