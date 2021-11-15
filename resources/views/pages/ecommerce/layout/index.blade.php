<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="index,follow" />
    <link rel="shortcut icon" href="/img/logo/logo.ico" />

    <link href="/css/prod/component/index_preload.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
    <link href="/css/prod/ecommerce/theme/cloudsite/index.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="/js/prod/component/index_preload.js{{ config('app.link_version') }}"></script>
    <script type="text/javascript" src="/js/prod/ecommerce/theme/cloudsite/index.min.js{{ config('app.link_version') }}"></script>

    @yield('head')

</head>

<body onunload="hideLoader()">

    <!--Loader section -->
    @include('component.loader')

    <!-- Nav section -->
    @include('pages.ecommerce.theme.cloudsite.nav')    
    
    <!-- Content section -->
    <div class="content">
        @yield('content')
    </div>    
     
    <!-- Footer & Chat section --> 
    @include('pages.ecommerce.theme.cloudsite.footer')   
    @include('pages.ecommerce.theme.cloudsite.chat')

</body>

<!-- Layout global script --> 
@include('script.index')
@include('script.ecommerce.index')
@include('script.ecommerce.chat')
@include('modal.coming')

</html>