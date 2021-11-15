@extends("pages.merchant.layout.index")

@section('head')

<title>Cloudsite - Order Management</title>
<link href="/css/plugin/slimselect.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<link href="/css/prod/component/table.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<link href="/css/page/merchant/order.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/plugin/slimselect.min.js{{ config('app.link_version') }}"></script>
<script defer type="text/javascript" src="/js/prod/component/table.js{{ config('app.link_version') }}"></script>

@endsection

@section('content')

<div class='table-section'>
    <div class='inline-table-form-section'>
        @include('component.table_top_section',[
            'title'=>'Order Management',
            'data'=>[
                ['type'=>'select', 'option'=> [''=>'All'] ,'name'=>'userID','title'=>
                'Customer'],
                ['type'=>'select', 'option'=> [''=>'All'],'name'=>'tx_status','title'=>
                'Status'],
                ['type'=>'date','name'=>'startDate','title'=> 'Start Date'],
                ['type'=>'date','name'=>'endDate','title'=> 'End Date'],
            ]
        ])
    </div>
    <div class='grid-view-toggle  toggle-table-view '>
        <div class='row'>
            @include('pages.merchant.order.item', ['index'=>1, 'status'=>1, 'statusText'=>'Success', 'deliveryType'=>'Manual'])
            @include('pages.merchant.order.item', ['index'=>2, 'status'=>3, 'statusText'=>'Failed', 'deliveryType'=>'DHL'])
            @include('pages.merchant.order.item', ['index'=>3, 'status'=>1, 'statusText'=>'Success', 'deliveryType'=>'Easy Parcel'])
            @include('pages.merchant.order.item', ['index'=>4, 'status'=>1, 'statusText'=>'Success', 'deliveryType'=>'Easy Parcel'])
            @include('pages.merchant.order.item', ['index'=>5, 'status'=>1, 'statusText'=>'Success', 'deliveryType'=>'Easy Parcel'])
            @include('pages.merchant.order.item', ['index'=>6, 'status'=>1, 'statusText'=>'Success', 'deliveryType'=>'Easy Parcel'])
            @include('pages.merchant.order.item', ['index'=>7, 'status'=>1, 'statusText'=>'Success', 'deliveryType'=>'Easy Parcel'])
            @include('pages.merchant.order.item', ['index'=>8, 'status'=>1, 'statusText'=>'Success', 'deliveryType'=>'Easy Parcel'])
            @include('pages.merchant.order.item', ['index'=>9, 'status'=>1, 'statusText'=>'Success', 'deliveryType'=>'Easy Parcel'])
        </div>          
    </div>
    <p class='search-total'> 9 Records </p>
   
</div>

@stop