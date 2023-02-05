<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="asim abdelgadir">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <link rel="apple-touch-icon" href="{{ asset('back-end/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('back-end/assets/images/favicon.ico') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('back-end/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/assets/css/site.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('back-end/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/vendor/chartist/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/vendor/jvectormap/jquery-jvectormap.css') }}">
    <!-- <link rel="stylesheet" href="back-end/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css"> -->
    <!-- <link rel="stylesheet" href="back-end/assets/examples/css/dashboard/v1.css"> -->


    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('back-end/fonts/weather-icons/weather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!-- import TTF fonts montserrat_medium.ttf -->
    <style>
        @font-face {
            font-family: 'Montserrat';
            src: url('fonts/montserrat_medium.ttf');
        }
    </style>

    <!--[if lt IE 9]>
    <script src="back-end/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="back-end/vendor/media-match/media.match.min.js"></script>
    <script src="back-end/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{{ asset('back-end/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
        Breakpoints();
    </script>

</head>

<body class="animsition dashboard">
    <div id="app">

        <main class="py-4">

            <!-- Page -->
            <div class="page">
                <div class="page-content container-fluid">
                    <div class="row" data-plugin="matchHeight" data-by-row="true">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- End Page -->

        </main>


        <!-- Footer -->
        <footer class="site-footer">
            <div class="site-footer-legal">© 2022 <a
                    href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">ASIM</a>
            </div>
            <div class="site-footer-right"> Crafted with <i class="red-600 wb wb-heart"></i> by <a
                    href="#">ASIM</a>
            </div>
        </footer>
        <!-- Core  -->


        <script src="{{ asset('back-end/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
        <script src="{{ asset('back-end/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('back-end/vendor/popper-js/umd/popper.min.js') }}"></script>
        <script src="{{ asset('back-end/vendor/bootstrap/bootstrap.js') }} "></script>
        <script src="{{ asset('back-end/vendor/animsition/animsition.js') }} "></script>
        <script src="{{ asset('back-end/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('back-end/vendor/asscrollbar/jquery-asScrollbar.js') }} "></script>
        <script src="{{ asset('back-end/vendor/asscrollable/jquery-asScrollable.js') }} "></script>
        <script src="{{ asset('back-end/vendor/ashoverscroll/jquery-asHoverScroll.js') }} "></script>

        <!-- Plugins -->
        <script src="{{ asset('back-end/vendor/switchery/switchery.js') }} "></script>
        <script src="{{ asset('back-end/vendor/intro-js/intro.js') }} "></script>
        <script src="{{ asset('back-end/vendor/screenfull/screenfull.js') }} "></script>
        <script src="{{ asset('back-end/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
        <script src="{{ asset('back-end/vendor/skycons/skycons.js') }} "></script>
        <script src="{{ asset('back-end/vendor/chartist/chartist.min.js') }} "></script>
        <!-- <script src="back-end/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script> -->
        <script src="{{ asset('back-end/vendor/aspieprogress/jquery-asPieProgress.min.js') }} "></script>
        <script src="{{ asset('back-end/vendor/jvectormap/jquery-jvectormap.min.js') }} "></script>
        <script src="{{ asset('back-end/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js') }} "></script>
        <script src="{{ asset('back-end/vendor/matchheight/jquery.matchHeight-min.js') }} "></script>

        <!-- Scripts -->
        <script src="{{ asset('back-end/js/Component.js') }} "></script>
        <script src="{{ asset('back-end/js/Plugin.js') }} "></script>
        <script src="{{ asset('back-end/js/Base.js') }} "></script>
        <script src="{{ asset('back-end/js/Config.js') }} "></script>

        <script src="{{ asset('back-end/assets/js/Section/Menubar.js') }} "></script>
        <script src="{{ asset('back-end/assets/js/Section/Sidebar.js') }} "></script>
        <script src="{{ asset('back-end/assets/js/Section/PageAside.js') }} "></script>
        <script src="{{ asset('back-end/assets/js/Plugin/menu.js') }} "></script>

        <!-- Config -->
        <script src="{{ asset('back-end/js/config/colors.js') }} "></script>
        <script src="{{ asset('back-end/assets/js/config/tour.js') }} "></script>
        <script>
            Config.set('assets', '../assets');
        </script>

        <!-- Page -->
        <script src="{{ asset('back-end/assets/js/Site.js') }} "></script>
        <script src="{{ asset('back-end/js/Plugin/asscrollable.js') }} "></script>
        <script src="{{ asset('back-end/js/Plugin/slidepanel.js') }} "></script>
        <script src="{{ asset('back-end/js/Plugin/switchery.js') }} "></script>
        <script src="{{ asset('back-end/js/Plugin/matchheight.js') }} "></script>
        <script src="{{ asset('back-end/js/Plugin/jvectormap.js') }} "></script>

        <script src="{{ asset('back-end/assets/examples/js/dashboard/v1.js') }}"></script>

    </div>
</body>

</html>
