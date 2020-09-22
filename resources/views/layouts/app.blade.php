<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('assets/front/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/plugins/OwlCarousel2-2.2.1/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/styles/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/styles/contact_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/styles/single_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/styles/single_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/styles/categories_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/styles/categories_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/styles/main_styles.css')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="super_container">

    <header class="header trans_300">

        <!-- Top Navigation -->

        <div class="top_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="top_nav_right">
                            <ul class="top_nav_menu">

                                <!-- Currency / Language / My Account -->

                                <li class="language">
                                    <a href="#">
                                        {{LaravelLocalization::getCurrentLocaleName() }}
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="language_selection">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li class="scrollable-container media-list w-100">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <a rel="alternate" style="color: #6B6F82;"
                                                           hreflang="{{ $localeCode }}"
                                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                            {{ $properties['native'] }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                @guest
                                    <li class="account">
                                        <a href="#">
                                            My Account
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="account_selection">
                                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"
                                                                                  aria-hidden="true"></i>Sign In</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"
                                                                                         aria-hidden="true"></i>Register</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @else

                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="{{ route('home') }}">colo<span>shop</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="{{ route('home') }}">home</a></li>
                                <li class="categories">
                                    <a href="#">
                                        Categories
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="categories_selection">
                                        @foreach($categories as $category)
                                            <li class="cat">
                                                <a href="/category/{{$category->id}}">
                                                    {{$category->name}}
                                                    {{--                                                    @isset($category -> subcat) <i class="fa fa-angle-right"></i> @endisset--}}
                                                </a>
                                                @isset($category -> subcat)
                                                    <ul class="subcategories_selection">
                                                        @foreach($category -> subcat as $subcategory)
                                                            @if($subcategory->active ==1)
                                                                <li>
                                                                    <a href="#">{{$subcategory->name}}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endisset

                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li><a href="#">shop</a></li>
                                <li><a href="#">promotion</a></li>
                                <li><a href="#">pages</a></li>
                                <li><a href="#">blog</a></li>
                                <li><a href="/contact">contact</a></li>

                            </ul>


                            <ul class="navbar_user">
                                <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                @if(Auth::user())
                                    <li class="user">
                                        <a><img style="height: 35px; border-radius:20px; "
                                                src="{{auth()->user()->image_path}}"
                                                alt="avatar"><i></i>
                                        </a>
                                        <ul class="user_selection">
                                            <li><a href="">
                                                    <i class="fa fa-user"></i>@lang('site.update_profile')
                                                </a></li>

                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-power-off"></i>
                                                    @lang('site.logout')
                                                </a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}"
                                                  method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>

                                @endif

                                <li class="checkout">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        @if(Auth::user())
                                            <span id="checkout_items" class="checkout_items">{{Auth::user()->orders->count()}}</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>


    <div id="app">


        {{--        <main class="py-4">--}}
        @yield('content')
        {{--        </main>--}}
    </div>

    <!-- Newsletter -->
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div
                        class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="post">
                        <div
                            class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required"
                                   data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
                                    value="Submit">subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div
                        class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="/contact">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div
                        class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_nav_container">
                        <div class="cr" style="text-align: center;">©2018 All Rights Reserverd. This template is made
                            with <i class="fa fa-heart-o"
                                    aria-hidden="true"></i>
                            by
                            <a href="#">Mohamed Draz</a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="{{asset('assets/front/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/front/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('assets/front/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/front/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('assets/front/plugins/easing/easing.js')}}"></script>
<script src="{{asset('assets/front/js/custom.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{asset('assets/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('assets/front/js/contact_custom.js')}}"></script>
<script src="{{asset('assets/front/js/single_custom.js')}}"></script>
<script src="{{asset('assets/front/js/categories_custom.js')}}"></script>
@yield('script')
</body>
</html>
