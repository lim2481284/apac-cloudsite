@extends("pages.merchant.layout.empty")

@section('head')
<title>Cloudsite - Merchant Login</title>
<link href="/css/page/merchant/auth.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>

@endsection

@section('content')

@include('component.blob')

<!--Loader section end -->
<div class='login-box row'>
    <div class='logo-section'>
        <div class='logo'>
            <img src="/img/logo/logo.png" /> Cloudsite.
        </div>
        {{ Form::select('def_lang', getSupportedLocalesNative(), LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale() , null, [], true) , ['class' => 'form-control language-select']) }}
    </div>
    <div class='col-sm-7'>
        <div class='vector-section'>
            <img src='/img/picture/account.png' />
        </div>
    </div>
    <div class='col-sm-5'>
        <div class='login-section'>
            <div class='header mb-3'>
                <h3>Login</h3>
            </div>
            <div class='login-form'>
                {{Form::open(['class'=>'loginbox', 'method'=>'post', 'url' => route('login.submit')])}}
                    <div class="loginbox loginpromptbox">
                        <div class="email">
                            <label class="logintxt">Email Address</label>
                            <input name="login" class="form-control " value="{{old('login')}}" type="text" placeholder="Please insert your email address" required />
                        </div>
                        <div class="password">
                            <label class="logintxt">Password</label>
                            <input name="password" class="form-control" type="password" placeholder="Please insert your password" required />
                        </div>
                    </div>
                    <div class="row">
                        <a href='#' class='btn btn-link forgot-link'>Forget Password?</a>       
                    </div>
                    <div class="signinbtn mt-4">
                        <button type="submit" class="btn btn-submit btn-primary">Login</button>                  
                    </div>
                    <a href='/register' class='btn btn-link'>Dont have account yet ? Register now</a>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>

@include('script.merchant.login')

@stop