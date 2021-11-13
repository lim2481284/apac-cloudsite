<!doctype html>
<html>

<head>
    <title>Cloudsite</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="/img/logo/logo.ico"/>
    <link href="/css/website/index.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="/js/website/index.js{{ config('app.link_version') }}"></script>
</head>

<body>

    <!--Loader section -->
    @include('components.loader')

    <!-- Content section -->
    <div class="content">
        <div id='contentSection'>
            <div id='canvasSection'></div>
            <div id='buttonSection'>
                <a href='#quote'><button class='btn btn-primary nav-btn hover quote-btn' type='button'> <i class="ti ti-heart"></i><span> Quote Now</span></button></a>
                <a href='#service'><button class='btn btn-primary nav-btn service-btn' type='button'> <i class="ti ti-star"></i><span> Service </span></button></a>
                <a href='#about'><button class='btn btn-primary nav-btn about-btn' type='button'> <i class="ti ti-face-smile"></i><span> About </span></button></a>
                <a href='#contact'><button class='btn btn-primary nav-btn contact-btn' type='button'> <i class="ti ti-thought"></i><span> Contact Us </span></button></a>
            </div>
            <div id="footerSection">
                <span  class=' nav-link copyright' >Copyright © {{date("Y")}} <b>Cloudsite</b>. All Rights Reserved</span>
            </div>
        </div>
    </div>

    <!-- Subpage section -->
    @include('pages.website.subpage.service')
    @include('pages.website.subpage.about')

</body>
</html>
