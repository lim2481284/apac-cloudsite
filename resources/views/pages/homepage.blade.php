@extends("layout")

@section('head')

<title>{{translate('cloudsite_solution_title','Cloudsite Solution - Web and E-Commerce Solution for SME.')}}</title>
<meta name="keywords" content="{{translate('index_meta_keyword','Index Meta Keyword')}}" />
<meta name="description" content="{{translate('index_meta_desc','Index Meta Desc')}}" />
<meta name="subject" content="{{translate('index_meta_subject','Index Meta Subject')}}">

<link href="/css/page/homepage.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/unicons.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/plugin/fontfile.js{{ config('app.link_version') }}"></script>
<script type="text/javascript" src="/js/plugin/threejs.js{{ config('app.link_version') }}"></script>
<script type="text/javascript" src="/js/plugin/jquery.nicescroll.min.js{{ config('app.link_version') }}"></script>
<script defer type="text/javascript" src="/js/page/homepage.js{{ config('app.link_version') }}"></script>

@endsection

@section('content')

<div id='contentSection'>
    <div id='canvasSection'></div>

    <div id='buttonSection'>
        <a href='#quote'><button class='btn btn-primary nav-btn hover quote-btn' type='button'> <i class="ti ti-heart"></i><span> Quote Now</span></button></a>
        <a href='#service'><button class='btn btn-primary nav-btn service-btn' type='button'> <i class="ti ti-star"></i><span> Service </span></button></a>
        <a href='#about'><button class='btn btn-primary nav-btn about-btn' type='button'> <i class="ti ti-face-smile"></i><span> About </span></button></a>
        <a href='#contact'><button class='btn btn-primary nav-btn contact-btn' type='button'> <i class="ti ti-thought"></i><span> Contact Us </span></button></a>
        <!-- <a href='/contact'><button class='btn btn-primary nav-btn'> <i class="ti ti-crown"></i><span> Login </span></button></a> -->
    </div>

    <div id="footerSection">
        <a href='#policy' class=' nav-link policy-btn'><span> Policy</span></a>
        <a href='#tac' class=' nav-link tac-btn'><span> T&C</span></a>
        <span  class=' nav-link copyright' >Copyright © {{date("Y")}} <b>Cloudsite Solution</b>. All Rights Reserved</span>
    </div>
</div>


@include('pages.subpage.policy')
@include('pages.subpage.tac')
@include('pages.subpage.quote')
@include('pages.subpage.service')
@include('pages.subpage.about')
@include('pages.subpage.contact')

@stop