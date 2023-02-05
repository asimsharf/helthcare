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
    <link rel="stylesheet" href="{{ asset('back-end/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/assets/examples/css/dashboard/v1.css') }}">

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

<body class="animsition site-menubar-unfold" style="animation-duration: 800ms; opacity: 1;">
    <div id="app">
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

        <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse bg-indigo-600"
            role="navigation">

            <div class="navbar-header">
                <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                    data-toggle="menubar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="hamburger-bar"></span>
                </button>
                <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                    data-toggle="collapse">
                    <i class="icon wb-more-horizontal" aria-hidden="true"></i>
                </button>
                <div class="navbar-brand navbar-brand-center">
                    <img class="navbar-brand-logo" src="{{ url('back-end/assets/images/logo.png') }}" title="LOGO">
                    <span class="navbar-brand-text hidden-xs-down"> LOGO</span>
                </div>
                <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
                    data-toggle="collapse">
                    <span class="sr-only">Toggle Search</span>
                    <i class="icon wb-search" aria-hidden="true"></i>
                </button>
            </div>

            <div class="navbar-container container-fluid">
                <!-- Navbar Collapse -->
                <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                    <!-- Navbar Toolbar -->
                    <ul class="nav navbar-toolbar">
                        <li class="nav-item hidden-float" id="toggleMenubar">
                            <a class="nav-link" data-toggle="menubar" href="#" role="button">
                                <i class="icon hamburger hamburger-arrow-left">
                                    <span class="sr-only">Toggle menubar</span>
                                    <span class="hamburger-bar"></span>
                                </i>
                            </a>
                        </li>
                        <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                            <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#"
                                role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                            </a>
                        </li>
                        <li class="nav-item hidden-float">
                            <a class="nav-link icon wb-search" data-toggle="collapse" href="#"
                                data-target="#site-navbar-search" role="button">
                                <span class="sr-only">Toggle Search</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Navbar Toolbar -->

                    <!-- Navbar Toolbar Right -->
                    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)"
                                data-animation="scale-up" aria-expanded="false" role="button">
                                <span class="flag-icon flag-icon-us"></span>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-gb"></span> English</a>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-sa"></span> Arabic</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#"
                                aria-expanded="false" data-animation="scale-up" role="button">
                                <span class="avatar avatar-online">
                                    <img src="{{ url('back-end/portraits/5.jpg') }}" alt="...">
                                    <i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i
                                        class="icon wb-user" aria-hidden="true"></i> Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i
                                        class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i
                                        class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                                <div class="dropdown-divider" role="presentation"></div>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i
                                        class="icon wb-power" aria-hidden="true"></i> Logout</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)"
                                title="Notifications" aria-expanded="false" data-animation="scale-up"
                                role="button">
                                <i class="icon wb-bell" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-danger up">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                <div class="dropdown-menu-header">
                                    <h5>NOTIFICATIONS</h5>
                                    <span class="badge badge-round badge-danger">New 5</span>
                                </div>

                                <div class="list-group">
                                    <div data-role="container">
                                        <div data-role="content">
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)"
                                                role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-order bg-red-600 white icon-circle"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">A new order has been placed</h6>
                                                        <time class="media-meta"
                                                            datetime="2018-06-12T20:50:48+08:00">5
                                                            hours ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)"
                                                role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-user bg-green-600 white icon-circle"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Completed the task</h6>
                                                        <time class="media-meta"
                                                            datetime="2018-06-11T18:29:20+08:00">2 days
                                                            ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)"
                                                role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-settings bg-red-600 white icon-circle"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Settings updated</h6>
                                                        <time class="media-meta"
                                                            datetime="2018-06-11T14:05:00+08:00">2 days
                                                            ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)"
                                                role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-calendar bg-blue-600 white icon-circle"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Event started</h6>
                                                        <time class="media-meta"
                                                            datetime="2018-06-10T13:50:18+08:00">3 days
                                                            ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)"
                                                role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon wb-chat bg-orange-600 white icon-circle"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Message received</h6>
                                                        <time class="media-meta"
                                                            datetime="2018-06-10T12:34:48+08:00">3 days
                                                            ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                        <i class="icon wb-settings" aria-hidden="true"></i>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                        All notifications
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages"
                                aria-expanded="false" data-animation="scale-up" role="button">
                                <i class="icon wb-envelope" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-info up">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                <div class="dropdown-menu-header" role="presentation">
                                    <h5>MESSAGES</h5>
                                    <span class="badge badge-round badge-info">New 3</span>
                                </div>

                                <div class="list-group" role="presentation">
                                    <div data-role="container">
                                        <div data-role="content">
                                            <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <span class="avatar avatar-sm avatar-online">
                                                            <img src="{{ url('back-end/portraits/2.jpg') }}"
                                                                alt="..." />
                                                            <i></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Mary Adams</h6>
                                                        <div class="media-meta">
                                                            <time datetime="2018-06-17T20:22:05+08:00">30 minutes
                                                                ago</time>
                                                        </div>
                                                        <div class="media-detail">Anyways, i would like just do it
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <span class="avatar avatar-sm avatar-off">
                                                            <img src="{{ url('back-end/portraits/3.jpg') }}"
                                                                alt="..." />
                                                            <i></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Caleb Richards</h6>
                                                        <div class="media-meta">
                                                            <time datetime="2018-06-17T12:30:30+08:00">12 hours
                                                                ago</time>
                                                        </div>
                                                        <div class="media-detail">I checheck the document. But there
                                                            seems
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <span class="avatar avatar-sm avatar-busy">
                                                            <img src="{{ url('back-end/portraits/4.jpg') }}"
                                                                alt="..." />
                                                            <i></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">June Lane</h6>
                                                        <div class="media-meta">
                                                            <time datetime="2018-06-16T18:38:40+08:00">2 days
                                                                ago</time>
                                                        </div>
                                                        <div class="media-detail">Lorem ipsum Id consectetur et minim
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <span class="avatar avatar-sm avatar-away">
                                                            <img src="{{ url('back-end/portraits/5.jpg') }}"
                                                                alt="..." />
                                                            <i></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Edward Fletcher</h6>
                                                        <div class="media-meta">
                                                            <time datetime="2018-06-15T20:34:48+08:00">3 days
                                                                ago</time>
                                                        </div>
                                                        <div class="media-detail">Dolor et irure cupidatat commodo
                                                            nostrud
                                                            nostrud.</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-footer" role="presentation">
                                    <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                        <i class="icon wb-settings" aria-hidden="true"></i>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                        See all messages
                                    </a>
                                </div>
                            </div>
                        </li>

                    </ul>
                    <!-- End Navbar Toolbar Right -->
                </div>
                <!-- End Navbar Collapse -->

                <!-- Site Navbar Seach -->
                <div class="collapse navbar-search-overlap" id="site-navbar-search">
                    <form role="search">
                        <div class="form-group">
                            <div class="input-search">
                                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="site-search"
                                    placeholder="Search...">
                                <button type="button" class="input-search-close icon wb-close"
                                    data-target="#site-navbar-search" data-toggle="collapse"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Site Navbar Seach -->
            </div>
        </nav>
        <div class="site-menubar site-menubar-light">
            <div class="site-menubar-body">
                <ul class="site-menu" data-plugin="menu">

                    <li class="site-menu-item has-sub">
                        <router-link to="/home" class="animsition-link">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </router-link>
                    </li>

                    {{-- Admins --}}
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Admins</span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Manage Admins</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Admins</span>
                                        </router-link>
                                    </li>
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Admins</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item">
                                <router-link to="/doctors/list" class="animsition-link">
                                    <span class="site-menu-title">List Admins</span>
                                </router-link>
                            </li>

                        </ul>
                    </li>


                    {{-- Doctors --}}
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Doctors</span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Manage Doctors</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Doctors</span>
                                        </router-link>
                                    </li>
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Doctors</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item">
                                <router-link to="/doctors/list" class="animsition-link">
                                    <span class="site-menu-title">List Doctors</span>
                                </router-link>
                            </li>

                        </ul>
                    </li>

                    {{-- Patients --}}
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Patients</span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Manage Patients</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Patients</span>
                                        </router-link>
                                    </li>
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Patients</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item">
                                <router-link to="/doctors/list" class="animsition-link">
                                    <span class="site-menu-title">List Patients</span>
                                </router-link>
                            </li>

                        </ul>
                    </li>

                    {{-- Appointments --}}
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Appointments</span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Manage Appointments</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Appointments</span>
                                        </router-link>
                                    </li>
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Appointments</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item">
                                <router-link to="/doctors/list" class="animsition-link">
                                    <span class="site-menu-title">List Appointments</span>
                                </router-link>
                            </li>

                        </ul>
                    </li>
                    {{-- Permissions --}}
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Permissions</span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Manage Permissions</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Permissions</span>
                                        </router-link>
                                    </li>
                                    <li class="site-menu-item">
                                        <router-link to="/doctors/list" class="animsition-link">
                                            <span class="site-menu-title">List Permissions</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item">
                                <router-link to="/doctors/list" class="animsition-link">
                                    <span class="site-menu-title">List Permissions</span>
                                </router-link>
                            </li>

                        </ul>
                    </li>


                </ul>
            </div>
        </div>

        <main class="page">

            <router-view></router-view>

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
