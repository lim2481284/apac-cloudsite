@extends("pages.merchant.layout.empty")

@section('head')

<title>Cloudsite - Merchant Onboarding</title>
<link href="/css/plugin/slimselect.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
<link href="/css/prod/component/table.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<link href="/css/prod/merchant/onboarding.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/plugin/slick.min.js{{ config('app.link_version') }}"></script>
<script type="text/javascript" src="/js/plugin/slimselect.min.js{{ config('app.link_version') }}"></script>

@endsection

@section('content')

@include('component.blob')

<input type='hidden' id='slideCount' value='-1' />
{!! Form::open(['route' =>'onboarding.submit','id'=>'startupSubmitForm']) !!}
<div class='startup-box'>
    <div class='slide-overlay'></div>
    <div class='startup-left-section index'>
        <div id="startupList">
            <div class='startup-content-box'>
                <div class='startup-content'>
                    <div class='startup-icon' style="background: url('/img/logo/logo.png')">
                    </div>
                    <h1 class='startup-title'>
                    Welcome to Cloudsite
                    </h1>
                    <p class='startup-description'>
                        A platform where merchants are connected through non-direct competition way to sell and manage ecommerce business together
                    </p>
                    <button class='btn btn-primary get-started-btn rounded startup-next' type='button'>Let's get Started</button>
                </div>
            </div>
              
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <input type='hidden' class='startup-question-type' value="other" />
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <h2> Website Template </h2>
                        <p> Pick your favourite webiste design</p>
                        <input type='hidden' name='template' value='1'/>
                        <div class='template-section row mt-4'>
                            <div class='col-sm-4 '>
                                <div class='template-item template-1 active'>
                                </div>
                            </div>
                            <div class='col-sm-4'>
                                <div class='template-item template-2 coming'>
                                </div>
                            </div>
                            <div class='col-sm-4'>
                                <div class='template-item template-3 coming'>
                                </div>
                            </div>
                        </div>
                        <small> ~ More template coming soon</small>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>Prev </button>
                        <button class='btn btn-primary-light  startup-next ' type='button'>Next </button>
                    </div>
                </div>
            </div>
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <input type='hidden' class='startup-question-type' value="other" />
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <h2> Web Store Name </h2>
                        <p> Tell us about your business name </p>
                        <input class="form-control" type="text" minlength='6' maxlength='30' name="name" value="{{old('name')}}" required>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>Prev </button>
                        <button class='btn btn-primary-light  startup-next ' type='button'>Next </button>
                    </div>
                </div>
            </div>
            
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <input type='hidden' class='startup-question-type' value="domain" />
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <div>
                            <h2> Website Name </h2>
                            <p> Tell us how you want to display your website name. </p>
                            <div class="web-co">
                                <input type="text" class="form-control domainInput" value="{{old('domain')}}" name="domain" minlength='2' maxlength='30' required>
                                <p class="web-co-link">.cloudsite.com</p>
                            </div>
                            <label id="domain-availability" class="form-text domainExist" data-availability="false"></label>
                            <small> <i class='ti-info-alt'></i> You can set up your own domain name later. </small>
                        </div>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>Prev </button>
                        <button class='btn btn-primary-light  startup-next ' type='button'>Next </button>
                    </div>
                </div>
            </div>
          
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <input type='hidden' class='startup-question-type' value="other" />
                    <input type='hidden' class='isRequired' value="required" data-name="{{$config['meta']['industry']}}" />
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <h2> Business Industry </h2>
                        <p> What type of products will you be selling </p>
                        
                        <div class="form-check form-check-inline store-idt-selection">
                            <select id="idt" name="{{$config['meta']['industry']}}[]" multiple>
                                @foreach (getConfig('merchant.industry') as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>Prev </button>
                        <button class='btn btn-primary-light  startup-next ' type='button'>Next </button>
                    </div>
                </div>
            </div>
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <h2> That's about it </h2>
                        <p> Let's get started to grow your business and move on to CloudSite. </p>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>Prev </button>
                        <button class='btn btn-primary startup-submit' type='button'> Let's Fight </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="progressBar"></div>
</div>
{!! Form::close() !!}

@include('script.merchant.onboarding')
@include('script.merchant.system.general.index')

@endsection