@extends("layout")

@section('head')

    <!-- Sample Meta for SEO --> 
    <title>{{translate('cloudsite_typography_design','Cloudsite - Typography Design')}}</title>
    <meta name="keywords" content="{{translate('index_meta_keyword','Index Meta Keyword')}}"/>
    <meta name="description" content="{{translate('index_meta_desc','Index Meta Desc')}}"/>
    <meta name="subject" content="{{translate('index_meta_subject','Index Meta Subject')}}">

    <link href="/css/prod/template/typography.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
    <script defer type="text/javascript" src="/js/prod/template/typography.js{{ config('app.link_version') }}"></script>

@endsection

@section('content')

    # https://tympanus.net/Development/DecorativeLetterAnimations/ 

    # https://designmodo.com/oversized-typography/

    # http://blog.karachicorner.com/2010/11/50-beautiful-typography-websites-designs-for-inspiration/

    # https://theultralinx.com/2014/02/20-websites-big-bold-typography/


    # https://tympanus.net/Development/LetterEffects/


@stop
