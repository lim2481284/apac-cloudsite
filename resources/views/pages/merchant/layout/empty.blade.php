<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="app-url" content="{{env('APP_URL')}}" />
    <meta name="robots" content="index,follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="/img/logo/logo.ico" />

    <link href="/css/prod/component/index_preload.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
    <link href="/css/prod/merchant/index.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/js/prod/component/index_preload.js{{ config('app.link_version') }}"></script>
    <script type="text/javascript" src="/js/prod/merchant/index.js{{ config('app.link_version') }}"></script>

    @yield('head')

</head>

<body id="emptyLayout">

    <!--Loader section -->
    @include('component.loader')

    <!-- Content section -->
    <div class="content">
        @yield('content')
    </div>

</body>

@include('script.index')
@include('script.merchant.index')
@include('modal.coming')

</html>