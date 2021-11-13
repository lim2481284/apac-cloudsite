<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="index,follow" />
    <meta name="author" content="Cloudsite, support@cloudsite.com.my">
    <link rel="shortcut icon" href="/img/logo/logo.ico"/>

    <link href="/css/prod/main.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="/js/prod/main_preload.js{{ config('app.link_version') }}"></script>
    <script defer type="text/javascript" src="/js/prod/main.js{{ config('app.link_version') }}"></script>

    @yield('head')

</head>

<body>

    <!--Loader section -->
    <div class='page-loader'>
        <div class='loader'>
            <img src="/img/icon/loader.gif"/>            
        </div>
    </div>

    <!-- NAV Section -->     
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class='container'>
            <a class="navbar-brand" href="#"><img src='/img/logo/logo.png'/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class='ti-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/pricing">Pricing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/login"><button class='btn btn-primary login-btn'> Login </button></a>
                </li>
                <li class="nav-item">
                <!--<a class="nav-link" href="/login"><button class='btn btn-secondary quote-btn'> Quote Now </button></a>-->
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Content section -->
    <div class="content">
        @yield('content')
    </div>


    <!-- Footer section -->
    <footer>
        <div class='container'>
            <p>
                &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> Cloudsite Solution {{translate('all_right','All rights reserved')}}
            </p>
        </div>        
    </footer>

</body>

@include('script.index')

</html>
