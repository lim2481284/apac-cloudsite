@extends("pages.merchant.layout.index")

@section('head')

<title>Cloudsite - Promotion Management</title>

@endsection

@section('content')

<div class='row'>
    @include('component.panel',['data'=>[
        [
            'img' => '/img/picture/gift.png',
            'title'=> 'Promo Code',
            'desc' => 'This feature allows merchants to manage promotional codes and send promotional codes to specific users or user groups through flexible option settings.',
            'btn_desc'=> 'Manage Promo Code'
        ],                                                                
        [
            'href'=>'/promotion/discount',
            'img' => '/img/picture/shop.png',
            'title'=> 'Product Discount',
            'desc' => 'This feature allows merchants to manage the discount rate of a single product or group of products by a fixed discount amount or percentage.',
            'btn_desc'=> 'Manage Product Discount'
        ]                                        
    ]])                                                          
</div>

@stop