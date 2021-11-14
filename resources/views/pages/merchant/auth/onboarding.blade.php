@extends("pages.merchant.layout.empty")

@section('head')

<title>{{translate('merchant_onboardig_title','Cloudsite - Onboarding')}}</title>
<link href="/css/plugin/slimselect.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
<link href="/css/prod/component/table.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<link href="/css/prod/merchant/startup.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/plugin/slick.min.js{{ config('app.link_version') }}"></script>
<script type="text/javascript" src="/js/plugin/slimselect.min.js{{ config('app.link_version') }}"></script>

@endsection

@section('content')

@include('component.blob')

<input type='hidden' id='slideCount' value='-1' />
{!! Form::open(['route' =>'startup.submit','id'=>'startupSubmitForm']) !!}
<div class='startup-box'>
    <div class='slide-overlay'></div>
    <div class='startup-left-section index'>
        <div id="startupList">
            <div class='startup-content-box'>
                <div class='startup-content'>
                    <div class='startup-icon' style="background: url('/img/logo/logo.png')">
                    </div>
                    <h1 class='startup-title'>
                        {{translate('welcome_cloudsite','Welcome to Cloudsite')}}
                    </h1>
                    <p class='startup-description'>
                        {{translate('welcome___cloudsite_desc','Our mission is to help you to grow in your business in the digital world. Stronger, together with Cloudsite !')}}
                    </p>
                    <button class='btn btn-primary get-started-btn rounded startup-next' type='button'>{{translate('lets_get_started','Lets get Started')}}</button>
                </div>
            </div>
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <input type='hidden' class='startup-question-type' value="other" />
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <h2> {{translate('webstore_name','Web Store Name')}} </h2>
                        <p> {{translate('business_name_desc','Tell us about your business name')}} </p>
                        <input class="form-control" type="text" minlength='6' maxlength='30' name="name" value="{{old('name')}}" required>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>{{translate('prev','Prev')}} </button>
                        <button class='btn btn-primary-light  startup-next ' type='button'>{{translate('next','Next')}} </button>
                    </div>
                </div>
            </div>
            
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <input type='hidden' class='startup-question-type' value="domain" />
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <div>
                            <h2> {{translate('webstore_domain','Website Name')}} </h2>
                            <p> {{translate('website_name_desc','Tell us how you want to display your website name.')}} </p>
                            <div class="web-co">
                                <input type="text" class="form-control domainInput" value="{{old('domain')}}" name="domain" minlength='2' maxlength='30' required>
                                <p class="web-co-link">.cloudsite.store</p>
                            </div>
                            <label id="domain-availability" class="form-text domainExist" data-availability="false"></label>
                        </div>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>{{translate('prev','Prev')}} </button>
                        <button class='btn btn-primary-light  startup-next ' type='button'>{{translate('next','Next')}} </button>
                    </div>
                </div>
            </div>
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <input type='hidden' class='startup-question-type' value="other" />
                    <input type='hidden' class='isRequired' value="required" data-name='lang' />
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <h2> {{translate('webstore_lang','Web Store Language')}} </h2>
                        <p> {{translate('webstore_lang_desc','Please pick your web store supported language.')}} </p>
                        {{Form::select($config['meta']['language'], getConfig('system.system_language'), 'en',['class'=>'form-control','required' => true])}}
                        
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>{{translate('prev','Prev')}} </button>
                        <button class='btn btn-primary-light  startup-next ' type='button'>{{translate('next','Next')}} </button>
                    </div>
                </div>
            </div>
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <input type='hidden' class='startup-question-type' value="other" />
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <h2> {{translate('about_startup_yourself','Your Experience')}} </h2>
                        <p> {{translate('about_startup_yourself_desc','Tell us about your online business experience')}} </p>
                        <select name="{{$config['meta']['startup_question']}}" class="form-control" required>
                            <option value='' disabled selected>{{translate('choose_following','Choose one of the following')}}</option>
                            @foreach($config['startup_question'] as $key=> $val)
                            <option value="{{$key}}">{{translate($val, $val)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>{{translate('prev','Prev')}} </button>
                        <button class='btn btn-primary-light  startup-next ' type='button'>{{translate('next','Next')}} </button>
                    </div>
                </div>
            </div>
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <input type='hidden' class='startup-question-type' value="other" />
                    <input type='hidden' class='isRequired' value="required" data-name="{{$config['meta']['industry']}}" />
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <h2> {{translate('business_industry','Business Industry')}} </h2>
                        <p> {{translate('business_industry_desc','What type of products will you be selling')}} </p>
                        
                        <div class="form-check form-check-inline store-idt-selection">
                            <select id="idt" name="{{$config['meta']['industry']}}[]" multiple>
                                @foreach (getConfig('merchant.industry') as $key => $val)
                                    <option value="{{$key}}">{{translate($val,$val)}}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>{{translate('prev','Prev')}} </button>
                        <button class='btn btn-primary-light  startup-next ' type='button'>{{translate('next','Next')}} </button>
                    </div>
                </div>
            </div>
            <div class='startup-content-box '>
                <div class='startup-content question-content'>
                    <div class='startup-component'>
                        <div class='logo-section'><img src='/img/logo/logo.png' /></div>
                        <h2> {{translate('thatsall','Thats about it')}} </h2>
                        <p> {{translate('thatsall_desc','Lets get started to grow your business and move on to CloudSite.')}} </p>
                    </div>
                    <div class='startup-footer'>
                        <button class='btn btn-secondary  startup-prev ' type='button'>{{translate('prev','Prev')}} </button>
                        <button class='btn btn-primary startup-submit' type='button'>{{translate('lets_fight','Lets Fight')}} </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="progressBar"></div>
</div>
{!! Form::close() !!}

@include('modal.merchant.system.general')
@include('script.merchant.startup')
@include('script.merchant.system.general.index')

@endsection