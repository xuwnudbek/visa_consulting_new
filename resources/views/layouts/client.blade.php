<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Awaiken">
    <!-- Page Title -->
    <title>Arbeit Weg</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/client/images/favicon.png">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="/client/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="/client/css/slicknav.min.css" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="/client/css/swiper-bundle.min.css">
    <!-- Font Awesome Icon Css-->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <!-- Animated Css -->
    <link href="/client/css/animate.css" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="/client/css/magnific-popup.css">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="/client/css/mousecursor.css">
    <!-- Main Custom Css -->
    <link href="/client/css/custom.css" rel="stylesheet" media="screen">

    @yield('styles')
</head>

<body>

    <!-- Preloader Start -->
    {{-- <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="/client/images/loader.svg" alt=""></div>
        </div>
    </div> --}}
    <!-- Preloader End -->

    {{-- @include('client.sections.topbar') --}}

    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo Start -->
                    <a class="navbar-brand" href="./">
                        <img src="{{ asset('client/images/logo.svg') }}" alt="Logo">
                    </a>
                    <!-- Logo End -->

                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        @if (auth()->check() && request()->routeIs('client.dashboard.*'))
                            <div class="mx-auto">
                                {{ Str::ucfirst(__('messages.welcome')) }}, <h5 class="d-inline-block">{{ auth()->user()->name }}</h5>
                            </div>
                        @else
                            <div class="nav-menu-wrapper">
                                <ul class="navbar-nav mr-auto" id="menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="./">{{ __('messages.home') }}</a>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about">{{ __('messages.about_us') }}</a>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#services">{{ __('messages.services') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#consultancy">{{ __('messages.consultancy') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#posts">{{ __('messages.posts') }}</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="{{ route('client.contact') }}">{{ __('messages.contact_us') }}</a>
                                    </li> --}}
                                </ul>
                            </div>
                        @endif

                        <!-- Contact Now Box Start -->
                        <div class="contact-now-box d-inline-flex">
                            @if (auth()->check())
                                @if (request()->routeIs('client.home') || request()->routeIs('client.contact'))
                                    <a href="{{ route('client.dashboard.profile') }}" class="btn-default">
                                        @lang('messages.dashboard')
                                    </a>
                                @else
                                    <a href="{{ route('client.home') }}" class="btn-default">
                                        @lang('messages.back_to_home')
                                    </a>

                                    <span class="mx-2"></span>

                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-default bg-danger text-white">
                                            @lang('messages.logout')
                                        </button>
                                    </form>
                                @endif
                            @else
                                @if (request()->routeIs('client.home'))
                                    <a href="{{ route('login') }}" class="btn-default">
                                        <span class="me-2">
                                            <i class="fa-solid fa-right-to-bracket"></i>
                                        </span>
                                        @lang('messages.login')
                                    </a>
                                @else
                                    <a href="{{ route('client.home') }}" class="btn-default bg-danger text-white">
                                        @lang('messages.back_to_home')
                                    </a>
                                @endif
                            @endif
                        </div>
                        <!-- Contact Now Box End -->
                    </div>

                    <!-- Main Menu End -->
                    <div class="navbar-toggle"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->


    @yield('content')



    <!-- Footer Start -->
    <footer class="main-footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!-- About Footer Start -->
                    <div class="about-footer">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            <img src="{{ asset('client/images/footer-logo.svg') }}" alt="">
                        </div>
                        <!-- Footer Logo End -->

                        <!-- About Footer Content Start -->
                        <div class="about-footer-content">
                            <p>{{ __('messages.footer_headline') }}</p>
                        </div>
                        <!-- About Footer Content End -->

                        <!-- Footer Social Link Start -->
                        <div class="footer-social-links">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- Footer Social Link End -->
                    </div>
                    <!-- About Footer End -->
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <!-- Footer Links Start -->
                    <div class="footer-links">
                        <h3>@lang('messages.footer_work_visas_title')</h3>
                        <ul>
                            <li><a href="{{ route('client.contact') }}">@lang('messages.footer_germany_job_visa')</a></li>
                            <li><a href="{{ route('client.contact') }}">@lang('messages.footer_required_documents')</a></li>
                            <li><a href="{{ route('client.contact') }}">@lang('messages.footer_visa_application_process')</a></li>
                            <li><a href="{{ route('client.contact') }}">@lang('messages.footer_faq')</a></li>
                        </ul>
                    </div>
                    <!-- Footer Links End -->
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <!-- Footer Links Start -->
                    <div class="footer-links">
                        <h3>@lang('messages.footer_quick_links_title')</h3>
                        <ul>
                            <li><a href="about.html">@lang('messages.footer_quick_links_about')</a></li>
                            <li><a href="services.html">@lang('messages.footer_quick_links_services')</a></li>
                            <li><a href="team.html">@lang('messages.footer_quick_links_team')</a></li>
                        </ul>
                    </div>
                    <!-- Footer Links End -->
                </div>

                <div class="col-lg-3 col-md-5">
                    <!-- Footer Newsletter Box Start -->
                    <div class="footer-newsletter-box footer-links">
                        <h3>@lang('messages.footer_newsletter_title')</h3>
                        <p>@lang('messages.footer_newsletter_text')</p>
                    </div>
                    <!-- Footer Newsletter Box End -->
                </div>
            </div>

            <!-- Footer Copyright Section Start -->
            <div class="footer-copyright">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <!-- Footer Copyright Start -->
                        <div class="footer-copyright-text">
                            <p>@lang('messages.copyright')</p>
                        </div>
                        <!-- Footer Copyright End -->
                    </div>

                    <div class="col-md-6">
                        <!-- Footer Menu Start -->
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('client.home') }}">{{ __('messages.footer_quick_links_home') }}</a></li>
                                <li><a href="{{ route('client.home') . '#about' }}">{{ __('messages.footer_quick_links_about') }}</a></li>
                            </ul>
                        </div>
                        <!-- Footer Menu End -->
                    </div>
                </div>
            </div>
            <!-- Footer Copyright Section End -->
        </div>
    </footer>
    <!-- Footer End -->


    <!-- Jquery Library File -->
    <script src="/client/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js file -->
    <script src="/client/js/bootstrap.min.js"></script>
    <!-- Validator js file -->
    <script src="/client/js/validator.min.js"></script>
    <!-- SlickNav js file -->
    <script src="/client/js/jquery.slicknav.js"></script>
    <!-- Swiper js file -->
    <script src="/client/js/swiper-bundle.min.js"></script>
    <!-- Counter js file -->
    <script src="/client/js/jquery.waypoints.min.js"></script>
    <script src="/client/js/jquery.counterup.min.js"></script>
    <!-- Magnific js file -->
    <script src="/client/js/jquery.magnific-popup.min.js"></script>
    <!-- SmoothScroll -->
    <script src="/client/js/SmoothScroll.js"></script>
    <!-- Parallax js -->
    <script src="/client/js/parallaxie.js"></script>
    <!-- MagicCursor js file -->
    <script src="/client/js/gsap.min.js"></script>
    <script src="/client/js/magiccursor.js"></script>
    <!-- Text Effect js file -->
    <script src="/client/js/SplitText.js"></script>
    <script src="/client/js/ScrollTrigger.min.js"></script>
    <!-- YTPlayer js File -->
    <script src="/client/js/jquery.mb.YTPlayer.min.js"></script>
    <!-- Wow js file -->
    <script src="/client/js/wow.min.js"></script>
    <!-- Main Custom js file -->
    <script src="/client/js/function.js"></script>
</body>

</html>
