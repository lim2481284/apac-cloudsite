@extends("pages.merchant.layout.empty")

@section('head')

<title> Cloudsite - Merchant Registration </title>
<link href="/css/page/merchant/auth.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<link href="/css/page/merchant/register.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<script defer type="text/javascript" src="/js/page/merchant/auth.js{{ config('app.link_version') }}"></script>
@endsection

@section('content')

@include('component.blob')

<!--Loader section end -->
<div class='login-box row register'>
    <div class='logo-section'>
        <div class='logo'>
            <img src="/img/logo/logo.png" /> Cloudsite.
        </div>
        {{ Form::select('def_lang', getSupportedLocalesNative(), LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale() , null, [], true) , ['class' => 'form-control language-select']) }}
    </div>
    <div class='col-md-6 col-12 d-flex'>
        <div class='vector-section'>
            <img src='/img/picture/register_bg.png' />
        </div>
    </div>
    <div class='col-md-1'>        
    </div>
    <div class='col-md-5 col-12'>
        <div class='login-section'>
            <div class='header mb-4'>
                <h3>Register</h3>
                <small>Create your online store now for FREE!</small>
            </div>
            <div class='login-form'>
                {{Form::open(['class'=>'loginbox', 'method'=>'post', 'url' => route('register.submit')])}}
                <input type='hidden' name='ref'/>
                <div class="loginbox loginpromptbox row">
                    <div class='col-12'>
                        <div class="email">
                            <label class="logintxt required">Name</label>
                            <input name="name" class="form-control" value="{{old('name')}}" type="text" maxlength='50' placeholder="Please insert your name" required />
                        </div>
                    </div>
                    <div class='col-12'>
                        <div class="email">
                            <label class="logintxt required">Email Address</label>
                            <input name="email" class="form-control" value="{{old('email')}}" type="email" maxlength='30' placeholder="Please insert your email address" required />
                        </div>
                    </div>

                    <div class='col-12'>
                        <div class="password">
                            <label class="logintxt required">Password</label>
                            <input name="password" class="form-control" type="password" minlength='6' maxlength='30' placeholder="Please insert your password" required />
                        </div>
                    </div>
                    <div class='col-12'>
                        <div class="password">
                            <label class="logintxt required">Confirm Password</label>
                            <input name="password_confirmation" class="form-control" minlength='6' maxlength='30' type="password" placeholder="Please insert your password again" required />
                        </div>
                    </div>
                  
                </div>
                <div class="signinbtn">
                    <button type="submit"    class="btn btn-submit btn-primary">Register</button>
                </div>
                <a href='/login' class='btn btn-link'>Already have account ? Login now</a>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>


@stop