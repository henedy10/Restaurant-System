<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Restaurant</title>
        <meta name="description" content="">
        <meta name="keywords" content="">

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Main CSS File -->
        <link href="assets/css/main.css" rel="stylesheet">

    </head>

    <body class="index-page">

        <header id="header" class="header d-flex align-items-center sticky-top">
            <div class="container position-relative d-flex align-items-center justify-content-between">

                <div class="logo d-flex align-items-center me-auto me-xl-0">
                    <i class="bi bi-fork-knife"></i>
                    <h1 class="sitename">NiceRestaurant</h1>
                </div>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#book-a-table">Book a Table</a></li>
                        <li><a href="#chefs">Chefs</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <a class="btn-getstarted d-none d-sm-block" href="#book-a-table">Book a Table</a>
                <a class="btn btn-outline-{{Auth::user() ? "success" : "danger"}} ml-2" href="{{route('home')}}">{{Auth::user() ? "Registered" : "Login (Admin)"}}</a>

            </div>
        </header>

        @yield('main-content')

        <footer id="footer" class="footer">
            <div class="container footer-top">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-about">
                        <h2 class="sitename logo d-flex align-items-center">NiceRestaurant</h2>
                        <p>
                            Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                            valies darta donna mare fermentum iaculis eu non diam phasellus.
                        </p>
                        <div class="social-links d-flex mt-4">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <!-- Contact Us -->
                    <div class="col-lg-2 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p><strong>Address: </strong><span>{{$data['info']->address ?? "-"}}</span></p>
                        <p class="mt-2"><strong>Phone:</strong> <span>{{$data['info']->phone ?? "-"}}</span></p>
                        <p><strong>Email:</strong> <span>{{$data['info']->email ?? "-"}}</span></p>
                    </div>

                    <!-- Subscribe -->
                    <div class="col-lg-3 col-md-6 footer-subscribe">
                        <h4>Subscribe to our Newsletter</h4>
                        <form action="{{route('subscribers.store')}}" method="post" class="d-flex flex-column">
                            @csrf
                            <input type="email" name="email" class="form-control mb-2" placeholder="Your Email" >
                                @error('email')
                                    <div class="alert alert-danger mt-2 p-1 small">{{ $message }}</div>
                                @enderror
                            <button type="submit" class="btn btn-primary btn-sm">Subscribe</button>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show text-center rounded shadow-sm p-3 mt-2" role="alert">
                                    <strong>✔️ {{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

        <!-- Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>
</html>
