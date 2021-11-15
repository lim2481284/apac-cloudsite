@extends("pages.ecommerce.layout.empty")

@section('head')

<title>Welcome to Cloudsite</title>
<link href="/css/page/merchant/auth.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
<link rel="shortcut icon" href="/img/logo/logo.ico" />

<style>
    #mainPic{
        width: 60%;
        max-width: 450px;
        margin-bottom: 25px;
    }
    .logo-section{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .logo-section h2{
        font-size: 20px;
        font-weight: 800;
        margin: 0;
        margin-left: 6px;
    }
</style>


@endsection

@section('content')

@include('component.blob')

<!--Loader section end -->
<div class='login-box row'>
    <div class='logo-section'>
        <img src='/img/logo/logo.png'/>
        <h2> Cloudsite </h2>
    </div>
    <div class='col-12'>
        <div class='login-section'>
            <div class='header text-center'>
                <img id="mainPic" src='/img/picture/store.png'/>
                <h3 class='mb-1'>Start your online business with Cloudsite</h3>
                <p> Good news! Your can get your own online Ecommerce Store for FREE & Forever. Let's get started with Cloudsite to sell and manage e-commerce business together with other merchants.</p>
                <a href='{{env("MERCHANT_URL")}}'><button class='btn btn-primary'>Get your store now</button></a>
            </div>
        </div>
    </div>
</div>

@endsection
