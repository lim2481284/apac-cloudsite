@extends("pages.merchant.layout.index")

@section('head')

<title> Cloudsite - Customer Management </title>
<link href="/css/page/merchant/customer.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
<link href="/css/prod/component/table.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
<script defer type="text/javascript" src="/js/prod/component/table.js{{ config('app.link_version') }}"></script>

@endsection

@section('content')

<div class='table-section'>
    <div class='inline-table-form-section'>
        @include('component.table_top_section',[
            'title'=> 'Customer Management',
            'data'=>[
                ['type'=>'date','name'=>'startDate','title'=> 'Start Date'],
                ['type'=>'date','name'=>'endDate','title'=> 'End Date'],
            ]
        ])
    </div>
    <div class='row'>
        @include('pages.merchant.customer.item', ['index'=>1, 'type'=> 'Purchased', 'name'=>'Jensen Lim', 'email'=>'lim@gmail.com', 'phone'=>'60162545885' , 'date'=>'15-11-2021', 'badge'=>'primary'])
        @include('pages.merchant.customer.item', ['index'=>2, 'type'=> 'Registered', 'name'=>'Alex', 'email'=>'alex@gmail.com', 'phone'=>'6054512542' , 'date'=>'15-11-2021', 'badge'=>'primary'])
        @include('pages.merchant.customer.item', ['index'=>3, 'type'=> 'Visited', 'name'=>'Jane', 'email'=>'********', 'phone'=>'********', 'date'=>'15-11-2021', 'badge'=>'secondary'])
        @include('pages.merchant.customer.item', ['index'=>4, 'type'=> 'Visited', 'name'=>'Christine', 'email'=>'********', 'phone'=>'********', 'date'=>'14-11-2021', 'badge'=>'secondary'])
        @include('pages.merchant.customer.item', ['index'=>5, 'type'=> 'Visited', 'name'=>'Edward', 'email'=>'********', 'phone'=>'********', 'date'=>'13-11-2021', 'badge'=>'secondary'])
        @include('pages.merchant.customer.item', ['index'=>6, 'type'=> 'Visited', 'name'=>'Kelvin', 'email'=>'********', 'phone'=>'********', 'date'=>'11-11-2021', 'badge'=>'secondary'])
    </div>
    
</div>

@stop