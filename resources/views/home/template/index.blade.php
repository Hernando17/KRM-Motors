<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('carserv') }}/{{ asset('carserv') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('carserv') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('carserv') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('carserv') }}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('carserv') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('carserv') }}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/toastr.min.css">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    @if (optional(Auth::user())->level != null)

        @if (optional(Auth::user())->level == 'admin')
            <!-- Topbar Start -->
            <div class="container-fluid bg-light p-0">
                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-lg-7 px-5 text-start">
                        <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                            {{-- <small class="fa fa-map-marker-alt text-primary me-2"></small> --}}
                            <small>Admin detected</small>
                        </div>
                    </div>
                    <div class="col-lg-5 px-5 text-end">

                        <div class="h-100 d-inline-flex align-items-center">
                            <a class="btn btn-success" href="{{ route('dasbor') }}">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar End -->
        @endif
    @endif



    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i><img src="{{ asset('carserv') }}/img/logo.png" width="150px"></i>KRM
                Motors</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            @if (!Route::is('find_car') && !Route::is('find_detail'))
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}"
                        class="nav-item nav-link {{ Route::is('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('services') }}"
                        class="nav-item nav-link {{ Route::is('services') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('contact') }}"
                        class="nav-item nav-link {{ Route::is('contact') ? 'active' : '' }}">Contact</a>
                </div>
            @endif

            @auth
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Sign In<i
                        class="fa fa-arrow-right ms-3"></i></a>
            @endguest

            @if (!Route::is('find_car') && !Route::is('find_detail'))
                @auth
                    <a href="{{ route('find_car') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Find Car<i
                            class="fa fa-arrow-right ms-3"></i></a>
                @endauth
            @else
                @auth
                    <a href="{{ route('home') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Exit<i
                            class="fa fa-arrow-left ms-3"></i></a>
                @endauth
            @endif

        </div>
    </nav>
    <!-- Navbar End -->


    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Sultan Iskandar Muda No 104</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 86598565897</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info.krmotors@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4">09.00 AM - 04.00 PM</p>
                    <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">09.00 AM - 2.00 PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="">General Check</a>
                    <a class="btn btn-link" href="">Engine Service</a>
                    <a class="btn btn-link" href="">Part Replacement</a>
                    <a class="btn btn-link" href="">Oil Changing</a>
                    <a class="btn btn-link" href="">Car Detailings</a>
                </div>
                
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">KRM Motors</a>, All Right Reserved.

                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->





    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('carserv') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('carserv') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('carserv') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('carserv') }}/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('carserv') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('carserv') }}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{ asset('carserv') }}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ asset('carserv') }}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('carserv') }}/js/main.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/toastr.min.js"></script>
    @stack('toastr')
</body>

</html>
