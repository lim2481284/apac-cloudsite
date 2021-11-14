<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="app-url" content="{{env('APP_URL')}}" />
    <meta name="robots" content="index,follow" />
    <meta name="author" content="Cloudsite, support@cloudsite.com.my">
    <link rel="shortcut icon" href="/img/logo/logo.ico" />

    <link href="/css/prod/component/index_preload.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
    <link href="/css/prod/merchant/index.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/js/prod/component/index_preload.js{{ config('app.link_version') }}"></script>
    <script type="text/javascript" src="/js/prod/merchant/index.js{{ config('app.link_version') }}"></script>

    @if(Auth::check() && (Auth::user()->getMeta('theme') == 'dark'))
    <link href="/css/page/merchant/dark.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
    @endif
    
    @yield('head')
    
    @laravelPWA

</head>

<body>

    <!--Loader section -->
    @include('component.loader')

    <div class='tour-db tour-mobile-db' data-index='0' data-mobile-index='0' data-intro-title="{{translate('tour_welcome_title')}}" data-intro="{{translate('tour_welcome_desc')}}"></div>

    <!-- Nav & Content -->
    <div class="overall-layout">

    @include('pages.merchant.layout.slidePane')
    
    <div class="wrapper d-flex flex-column align-items-stretch">

        @include('pages.merchant.layout.side_menu')

        <div class="top-panel">

            <a class="hamburger-btn" href="#">
                <img id="hamburger-trigger-bar" class="tour-db tour-mobile-db" data-element data-mobile-index='2' 
                data-intro="{{translate('tour_mobile_hamburger_btn')}}" src="/img/icon/align_menu.png" />
            </a>


        </div>

        <!-- Page Content  -->
        <div id="pageContent">

            @include('pages.merchant.layout.top_nav')

            <div class="content-layout">
            @yield('content')
            </div>

            @include('pages.merchant.layout.bottom_nav')

            @include('pages.merchant.layout.tool')
            
        </div>
        
    </div>

    </div>

</body>

@include('modal.action')

@include('script.index')
@include('script.merchant.index')
@include('script.merchant.native_mobile')

</html>