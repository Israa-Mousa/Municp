<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
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
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/Magnific-Popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/App/plugins/revolution/css/navigation.css') }}">
    <!-- Custom-->
    <link rel="stylesheet" href="{{ asset('assets/App/css/style.css') }}">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">
    <div class="header--sidebar"></div>
    <header class="header" style="">
    <div class="header__top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                        <p>{{ __('app.location') }}</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="header__actions">
                            @auth
                            {{-- <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a> --}}
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit()">{{ __('app.Logout') }}</a>
                            <form id="logout" action="{{ route('logout') }}" method="post" style="display: none;">
                                @csrf
                            </form>
                            @else
                            <a href="{{ route('login') }}">{{ __('app.Login & Regiser') }}</a>
                            @endauth
                            {{-- <div class="btn-group ps-dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><img src="images/flag/usa.svg" alt=""> USD</a></li>
                                    <li><a href="#"><img src="images/flag/singapore.svg" alt=""> SGD</a></li>
                                    <li><a href="#"><img src="images/flag/japan.svg" alt=""> JPN</a></li>
                                </ul>
                            </div> --}}
                            <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('language') }}<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/1">{{ __('english') }}</a></li>
                                    <li><a href="/2">{{ __('arabic') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="container-fluid">
                <div class="navigation__column left">
                    <div class="header__logo"><a class="ps-logo" href="index.html"><img src="{{asset('image/header2.jpg')}}" alt=""></a></div>
                </div>
                <div class="navigation__column center">
                    <ul class="main-menu menu">
                        <li class="menu-item menu-item-has-children dropdown"><a href="index.html">Home</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="index.html">Homepage #1</a></li>
                                <li class="menu-item"><a href="#">Homepage #2</a></li>
                                <li class="menu-item"><a href="#">Homepage #3</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Muncipility</a>
                            <div class="mega-menu">
                                <div class="mega-wrap">
                                    <div class="mega-column">
                                        <ul class="mega-item mega-features">
                                            {{-- <li><a href="product-listing.html">NEW RELEASES</a></li>
                                            <li><a href="product-listing.html">FEATURES SHOES</a></li>
                                            <li><a href="product-listing.html">BEST SELLERS</a></li>
                                            <li><a href="product-listing.html">NOW TRENDING</a></li>
                                            <li><a href="product-listing.html">SUMMER ESSENTIALS</a></li>
                                            <li><a href="product-listing.html">MOTHER'S DAY COLLECTION</a></li>
                                            <li><a href="product-listing.html">FAN GEAR</a></li> --}}
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">Tourism and Antiquities</h4>
                                        {{-- <ul class="mega-item">
                                            <li><a href="product-listing.html">All Shoes</a></li>
                                            <li><a href="product-listing.html">Running</a></li>
                                            <li><a href="product-listing.html">Training & Gym</a></li>
                                            <li><a href="product-listing.html">Basketball</a></li>
                                            <li><a href="product-listing.html">Football</a></li>
                                            <li><a href="product-listing.html">Soccer</a></li>
                                            <li><a href="product-listing.html">Baseball</a></li>
                                        </ul> --}}
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">projects and achievements</h4>
                                        <ul class="mega-item">
                                            <li><a href="product-listing.html">Compression & Nike Pro</a></li>
                                            <li><a href="product-listing.html">Tops & T-Shirts</a></li>
                                            <li><a href="product-listing.html">Polos</a></li>
                                            <li><a href="product-listing.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-listing.html">Jackets & Vests</a></li>
                                            <li><a href="product-listing.html">Pants & Tights</a></li>
                                            <li><a href="product-listing.html">Shorts</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">Citizen Services</h4>
                                        <ul class="mega-item">
                                            <li><a href="product-listing.html">Compression & Nike Pro</a></li>
                                            <li><a href="product-listing.html">Tops & T-Shirts</a></li>
                                            <li><a href="product-listing.html">Polos</a></li>
                                            <li><a href="product-listing.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-listing.html">Jackets & Vests</a></li>
                                            <li><a href="product-listing.html">Pants & Tights</a></li>
                                            <li><a href="product-listing.html">Shorts</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">decisions</h4>
                                        {{-- <ul class="mega-item">
                                            <li><a href="product-listing.html">NIKE</a></li>
                                            <li><a href="product-listing.html">Adidas</a></li>
                                            <li><a href="product-listing.html">Dior</a></li>
                                            <li><a href="product-listing.html">B&G</a></li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item"><a href="#">Advertisement</a></li>
                        <li class="menu-item"><a href="#">Map</a></li>
                        <li class="menu-item menu-item-has-children dropdown"><a href="#">News</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-has-children dropdown"><a href="blog-grid.html"> Latest Blogs </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="blog-grid.html">Blog Grid 1</a></li>
                                        <li class="menu-item"><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children dropdown"><a href="#">Contact</a>
                            {{-- <ul class="sub-menu">
                                <li class="menu-item"><a href="contact-us.html">Contact Us #1</a></li>
                                <li class="menu-item"><a href="contact-us.html">Contact Us #2</a></li>
                            </ul> --}}
                        </li>
                    </ul>
                </div>
                <div class="navigation__column right">
                    <form class="ps-search--header" action="do_action" method="post">
                        <input class="form-control" type="text" placeholder="Search Product…">
                        <button><i class="ps-icon-search"></i></button>
                    </form>
                    {{-- <x-cart-menu /> --}}
                    <div class="menu-toggle"><span></span></div>
                </div>
            </div>
        </nav>
    </header>
    <div class="header-services">
        {{-- {{}} --}}


        <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
            @foreach ( $blogs  as $index )

           <p class="ps-service"><i class="fa fa-book"></i><strong>{{ $index->name }}</strong>{{ $index->Introduction }}</p>
           @endforeach
        </div>
    </div>
    <main class="ps-main">

        {{-- <x-flash-message /> --}}

        {{ $slot }}

        <div class="ps-subscribe">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                        <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                        <form class="ps-subscribe__form" action="do_action" method="post">
                            <input class="form-control" type="text" placeholder="">
                            <button>Sign up now</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                        <p>...and receive <span>$20</span> coupon for first shopping.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer bg--cover" data-background="">
            <div class="ps-footer__content">
                <div class="ps-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--info">
                                <header><a class="ps-logo" href="index.html"><img src="{{asset('/image/logo2.png') }}" alt=""></a>
                                    <h3 class="ps-widget__title">{{__('ADDRESS OFFICE')}}</h3>
                                </header>
                                <footer>
                                    <p><strong>{{__('app.location')  }}</strong></p>
                                    <p>{{__('app.email')}}: <a href='mailto: info@ramallah.ps'> info@ramallah.ps</a></p>
                                    <p>{{ __('app.phone') }}: +2945555
                                    </p>
                                    <p>{{__('app.fax')  }}: Fax 022963214
                                    </p>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--info second">
                                <header>
                                    <h3 class="ps-widget__title">Address Office 2</h3>
                                </header>
                                <footer>
                                    <p><strong>{{__('app.location')  }}</strong></p>
                                    <p>{{__('app.email')}}: <a href='mailto: info@ramallah.ps'> info@ramallah.ps</a></p>
                                    <p>{{ __('app.phone') }}: +2945555
                                    </p>
                                    <p>{{__('app.fax')  }}: Fax 022963214
                                    </p>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Find Our App</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--link">
                                        <li><a href="#">Coupon Code</a></li>
                                        <li><a href="#">SignUp For Email</a></li>
                                        <li><a href="#">Site Feedback</a></li>
                                        <li><a href="#">Careers</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Get Help</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--line">
                                        <li><a href="#">Order Status</a></li>
                                        <li><a href="#">Shipping and Delivery</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Payment Options</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Products</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--line">
                                        <li><a href="#">Shoes</a></li>
                                        <li><a href="#">Clothing</a></li>
                                        <li><a href="#">Accessries</a></li>
                                        <li><a href="#">Football Boots</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-footer__copyright">
                <div class="ps-container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <p>&copy; <a href="#">{{ __('Ramallah Municipality app') }}</a>{{ __('All rights reserved') }} {{ __('Design by') }} <a href="#"> {{ __('designer name') }}</a></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <ul class="ps-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
