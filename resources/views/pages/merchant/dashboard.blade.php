@extends("pages.merchant.layout.index")

@section('head')

<title>Cloudsite - Merchant Dashboard</title>
<link href="/css/prod/merchant/dashboard.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/prod/merchant/dashboard.js{{ config('app.link_version') }}"></script>

@endsection

@section('content')

<div class='row'>


    <div class='col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7'>
        <div class='ref-box'>
            <h1>Grow your business with Cloudsite </h1>
            <p>Sell and manage e-commerce business with merchants on Cloudsite platform </p>
            <a href='{{env("ECOMMERCE_URL")}}{{getMerchant()->domain}}'><button class='btn btn-default onboarding-btn'>Visit My Store </button></a>
            <button class='btn btn-primary under-development' data-title='Onboarding Checklist' data-desc='This feature will guide merchants how to set up their online store step by step.'> Onboarding </button>
            <img src='/img/picture/refland3.gif'/>
        </div>

        <div id="overviewChart">
            <h2> Revenue Overview </h2>
            <canvas id="lineChart" class='line-chart' style="height:200px; max-height:200px" > </canvas>   
        </div>

    </div>
    <div class='col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1'></div>
    <div class='col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4'>
        <div class="dashboard-view-list">
            <div class='dashboard-list active'>
                <div class='icon-box'>
                    <i class='ti ti-money'></i>
                </div>
                <div class='list-content referrar'>
                    <p> Account Balance </p>
                    <h2> 500.00 </h2> 
                    <img src='/img/icon/coin.png'/>
                </div>
                <div class='list-action'>
                    <a href='#' class='under-development' data-title='Credit Withdrawal' data-desc='This feature allows merchants to submit credit withdrawal requests. Cloudsite will take one to three business days to process the request'> Withdraw </a>
                </div>
            </div>

            <div class='dashboard-list'>
                <div class='icon-box'>
                    <i class='ti ti-star'></i>
                </div>
                <div class='list-content'>
                    <p> Total Earning </p>
                    <h2> 5421.00 </h2> 
                </div>
            </div>
            <div class='dashboard-list'>
                <div class='icon-box'>
                    <i class='ti ti-heart'></i>
                </div>
                <div class='list-content'>
                    <p> Total Customer </p>
                    <h2> 435 </h2> 
                </div>
            </div>
        </div>

        <div class='activity-list'>
            <p class='list-title'>Recent Activity </p>
            <div class='list-item'>
                <div class='item-content'>
                    <h2> Earning </h2>
                    <p> 2021-11-14 15:45:20</p>
                </div>
                <div class='item-balance'>
                    <span class='badge badge-positive'>+500</span>
                </div>
            </div>
            <div class='list-item'>
                <div class='item-content'>
                    <h2> Withdrawal </h2>
                    <p> 2021-11-14 16:45:20</p>
                </div>
                <div class='item-balance'>
                    <span class='badge badge-negative'>-500</span>
                </div>
            </div>
            <div class='list-item'>
                <div class='item-content'>
                    <h2> Withdrawal </h2>
                    <p> 2021-11-14 17:45:20</p>
                </div>
                <div class='item-balance'>
                    <span class='badge badge-negative'>-500</span>
                </div>
            </div>

        </div>
    </div>

</div>

@include('script.merchant.dashboard')
@include('component.chart.setting')
@include('component.chart.singleLine',[
    'id'=>'lineChart',
    'chartTitle' => '',
    'bgStart' => '#605DFB',
    'bgEnd' =>'#FF8355',
    'lineStart' => '#3C39EA',
    'lineEnd' => '#FF6A32',
    'data'=> $revenueData
])


@stop
