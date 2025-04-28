<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Owner and company details')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/theme/favicon.png')}}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.gritter.min.css')}}" />
</head>

<body>
    
   @include('frontend.layouts.header')
    <!--End header-->
    <main class="main">
    @yield('content')
    </main>
    @include('frontend.layouts.footer')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/images/theme/loading.gif')}}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('frontend/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{ asset('frontend/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/slick.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/waypoints.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/wow.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/select2.min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/counterup.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/images-loaded.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/isotope.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/scrollup.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery.elevatezoom.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.gritter.min.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/js/main5103.js?v=6.0')}}"></script>
    
    <script src="{{ asset('frontend/js/shop5103.js?v=6.0')}}"></script>
    <script src="{{ asset('frontend/jspages/cart.js')}}"></script>
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var userid = "{{ Auth::user()->id ?? '' }}";
        </script>
    @stack('scripts')
</body>


</html>