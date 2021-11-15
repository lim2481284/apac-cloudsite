@extends("pages.merchant.layout.index")

@section('head')

<title>Cloudsite - Store Management</title>

@endsection

@section('content')

<div class='row'>
    @include('component.panel',['data'=>[
        [
            'img' => '/img/picture/setting.png',
            'title'=> 'General Setting',
            'desc' =>'This feature allows merchants to manage store settings, such as store name, logo, domain name, social integration, notifications, etc.',
            'btn_desc'=>'Manage Setting'
        ],                                                                   
        [
            'img' => '/img/picture/inventory.png',
            'title'=> 'Shipping',
            'desc' => 'This feature allows merchants to manage the shipping settings for online store, such as adjusting the default shipping rates, setting free shipping conditions, etc.',
            'btn_desc'=> 'Manage Shipping',
        ],                                                                   
        [
            'img' => '/img/picture/cms.png',
            'title'=> 'Website Builder',
            'desc' => 'This feature allows merchants to customize their website page design, drag and drop page blocks and select preset templates from the Cloudsite library',
            'btn_desc'=> 'Manage Website',
        ],   
        [
            'img' => '/img/picture/agency.png',
            'title'=> 'Annoucement',
            'desc' => 'This feature allows merchants to manage the announcement notifications of online stores, such as making pop-up notification announcements, setting up sticky notification bar at the top, etc.',
            'btn_desc'=> 'Manage Annoucement',
        ],                                                                      
        [
            'img' => '/img/picture/staff.png',
            'title'=> 'Staff',
            'desc' => 'This feature allows merchants to create staff accounts with flexible permission settings to manage their online stores',
            'btn_desc'=> 'Manage Staff',
        ],    
        [
            'img' => '/img/picture/gift.png',
            'title'=> 'Goal',
            'desc' => 'This is a unique feature that allows merchants to set their sales goals with real credit rewards to motivate merchants.',
            'btn_desc'=> 'Manage Goal',
        ], 
    ]])    
    
</div>

@stop