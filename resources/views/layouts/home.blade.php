<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>LajurInfo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" href="{{ asset('home/img/logo/logo-favicon-tb.svg') }}" />


		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/ticker-style.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/flaticon.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/slicknav.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/animate.min.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/fontawesome-all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/slick.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
            <link rel="stylesheet" href="{{ asset('home/css/news.css') }}">

        <!-- icon FA CDN -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


   </head>

   <body>

    <!-- Preloader Start -->
    
        <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="home/img/logo/logo-tb.svg" style="width: 150px;" alt="">
                </div>
            </div>
        </div>
    </div> 
    <!-- Preloader Start -->

    @include('component.navbar-home')

    @yield('content')

    @include('component.footer-home')

	<!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('home/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('home/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('home/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('home/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('home/js/wow.min.js') }}"></script>
    <script src="{{ asset('home/js/animated.headline.js') }}"></script>
    <script src="{{ asset('home/js/jquery.magnific-popup.js') }}"></script>

    <!-- Breaking New Pluging -->
    <script src="{{ asset('home/js/jquery.ticker.js') }}"></script>
    <script src="{{ asset('home/js/site.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('home/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('home/js/contact.js') }}"></script>
    <script src="{{ asset('home/js/jquery.form.js') }}"></script>
    <script src="{{ asset('home/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('home/js/mail-script.js') }}"></script>
    <script src="{{ asset('home/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('home/js/plugins.js') }}"></script>
    <script src="{{ asset('home/js/main.js') }}"></script>

     <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif

    </body>
</html>
