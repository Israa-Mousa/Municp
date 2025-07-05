
<header class="header" style="" >
    <div class="header__top">
            {{-- <div class="container-fluid"> --}}
                <div class="container-fluid {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

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
                            <a href="{{ route('login') }}">{{ __('Login & Register') }}</a>

                            @endauth

                            <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('language') }}<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    {{-- <li><a href="/1">{{ __('english') }}</a></li>
                                    <li><a href="/2">{{ __('arabic') }}</a></li> --}}
                                    <li><a href="{{ url('/en') }}">{{ __('english') }}</a></li>
<li><a href="{{ url('/ar') }}">{{ __('arabic') }}</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="container-fluid">
                <div class="navigation__column  {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }} left">
                    <div class="header__logo"><a class="ps-logo" style="padding-top:8px!important" href="index.html"><img src="{{asset('image/header2.jpg')}}" alt=""></a></div>
                </div>
                <div class="navigation__column  {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }} center">
                    <ul class="main-menu menu {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                        <li class="menu-item menu-item-has-children dropdown"><a href="/">{{ trans('app.Home') }}</a>

                        </li>
                        <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">{{ trans('app.Municipality') }}</a>
                            <div class="mega-menu">
                                <div class="mega-wrap">
                                    <div class="mega-column">
                                        <ul class="mega-item mega-features">

                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">{{ trans('app.TOURISM AND ANTIQUITIES') }}</h4>
                                        <ul class="mega-item">
                                            @foreach ($tourisms as $tourism)
                                            <li><a href="product-listing.html"
                                                >@if(Session::get('locale')=="ar"){{ $tourism->name_ar }}@else{{ $tourism->name}}@endif</a></li>



                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">{{ __('app.PROJECTS AND ACHIEVEMENTS') }}</h4>
                                        <ul class="mega-item">
                                            @foreach ($projects as $project)
                                            <li><a href="{{ route('app.projects',$project->id) }}">
                            @if(Session::get('locale')=="ar"){{ $project->name_ar }}@else{{ $project->name}}@endif</a></li>


                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">{{ __('app.CITIZEN SERVICES') }}</h4>
                                        <ul class="mega-item">
                                            @foreach ($services as $service)
                                            @if(Session::get('locale')=="ar")
                                            <li><a href="product-listing.html">{{ $service->name_ar }}</a></li>
                                            @else
                                            <li><a href="product-listing.html">{{ $service->name }}</a></li>
                                           @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="menu-item"><a href="/app/map">{{ trans('app.Map') }}</a></li>
                        <li class="menu-item menu-item-has-children dropdown"><a href="#">{{ __('app.News') }}</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-has-children dropdown"><a href="blog-grid.html"> {{ __('app.Latest Blogs') }} </a>
                                    <ul class="sub-menu">
                                        @foreach ($blogs as $blog)
                                        <li class="menu-item">
                                            <a href="{{ route('app.blogs') }}">
                                                @if(Session::get('locale')=="ar"){{ $blog->name_ar }}@else{{ $blog->name}}@endif</a></li>

                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item"><a href="/app/contact">{{ __('contact') }}</a>
                        </li>


                    </ul>
                </div>
                <div class="navigation__column  {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }} right">
                    <form class="ps-search--header" action="do_action" method="post">
                        <input class="form-control" type="text" placeholder="{{ __('search') }}">
                        <button><i class="ps-icon-search"></i></button>
                    </form>

                    <div class="menu-toggle"><span></span></div>
                </div>
            </div>
        </nav>
    </header>



