<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="app-url" content="{{env('APP_URL')}}" />
    <meta name="robots" content="index,follow" />
    <link rel="shortcut icon" href="/img/logo/logo.ico" />

    <link href="/css/prod/component/index_preload.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
    <link href="/css/prod/merchant/index.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/js/prod/component/index_preload.js{{ config('app.link_version') }}"></script>
    <script type="text/javascript" src="/js/prod/merchant/index.js{{ config('app.link_version') }}"></script>
    
    @yield('head')
    

</head>

<body>

    <!--Loader section -->
    @include('component.loader')

    <div class='tour-db tour-mobile-db' data-index='0' data-mobile-index='0' data-intro-title="Welcome!" data-intro="Click next to start the Dashboard tour guide."></div>
    
    <!-- Nav & Content -->
    <div class="wrapper d-flex flex-column align-items-stretch">

        @include('pages.merchant.layout.side_menu')

        <a class="hamburger-btn" href="#"><i id="hamburger-trigger-bar" class="fa fa-bars tour-db tour-mobile-db" data-element data-mobile-index='2' 
            data-intro="Click here to navigate to other sections." ></i></a>

        <!-- Page Content  -->
        <div id="pageContent">

            @include('pages.merchant.layout.top_nav')

            @yield('content')

            
            @include('pages.merchant.layout.tool')

        </div>
        
    </div>

</body>

@include('script.index')
@include('script.merchant.index')
@include('modal.coming')

</html>