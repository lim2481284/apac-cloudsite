<!doctype html>
<html>

<head>

    <title>Cloudsite - Brand New Ecommerce Solution</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="/img/logo/logo.ico"/>
    <link href="/css/prod/website/index.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="/js/prod/website/index.min.js{{ config('app.link_version') }}"></script>

</head>

<body>

    <!--Loader section -->
    @include('component.loader')

    <!-- Content section -->
    <div class="content">
        <div id='contentSection'>
            <div id='canvasSection'></div>
            <div id='buttonSection'>
                <a href='http://merchant.apac2.test'><button class='btn btn-primary nav-btn hover quote-btn' type='button'> <i class="ti ti-heart"></i><span> Get Started</span></button></a>
                <a href='#about'><button class='btn btn-primary nav-btn about-btn' type='button'> <i class="ti ti-face-smile"></i><span> About </span></button></a>
            </div>
        </div>
    </div>

    <!-- Subpage section -->
    @include('pages.website.subpage.service')
    @include('pages.website.subpage.about')

     <!-- Post script section -->
    <script type="text/javascript" src="/js/plugin/threejs.js{{ config('app.link_version') }}"></script>
    <script type="text/javascript" src="/js/page/website/index.js{{ config('app.link_version') }}"></script>

</body>
</html>
