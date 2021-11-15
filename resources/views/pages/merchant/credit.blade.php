@extends("pages.merchant.layout.index")

@section('head')

<title>Cloudsite - Merchant Credit</title>
<link href="/css/page/merchant/credit.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<link href="/css/prod/component/table.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
<script defer type="text/javascript" src="/js/prod/component/table.js{{ config('app.link_version') }}"></script>
<link href="/css/prod/component/chartjs.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/prod/component/chartjs.min.js{{ config('app.link_version') }}"></script>
@endsection

@section('content')

<div class='header'>
    <a href='/'>
        <button class='btn circle-btn back-btn mb-0'> 
            <i class='ti-arrow-left'> </i>
            <span>Back</span>
        </button>
    </a>
    <h1>My Credit</h1>
</div>
<div class='row'>
    <div class='col-sm-12 col-md-12 col-lg-7 col-xl-7'>
        <div class='credit-section'>
            <div class='row'>
                <div class='col-sm-6 left-section'>
                    <h1> Credit Balance </h1>
                    500
                    <div class='mt-2'>
                        <a  class='under-development' data-title='Topup' data-desc='This feature allows merchants to topup credit their accounts. These credits are used to process shipping orders, purchase domain names, or subscribe to different services.'><button class='topup-btn btn circle-btn third-circle-btn'> <i class='ti-plus'> </i> <span>Topup</span></button></a>
                        <a  class='under-development' data-title='Withdrawal' data-desc='This feature allows merchants to submit withdrawal requests. Cloudsite will take one to three business days to process the request'><button class=' withdraw-btn btn circle-btn circle-btn ml-3 ' > <i class='ti-cloud-down'> </i> <span>Withdraw</span></button></a>
                    </div>
                </div>
                <div class='col-sm-6 left-credit-col'>                  
                    <img src='/img/picture/transfer.png'/>
                </div>
            </div>
        </div>
        <div class='history-section ' >
            <div class='d-flex justify-content-between align-items-center mb-4 '>
                <h1 class='title'>Recent Activity</h1>
                
                <a  class='under-development' data-title='Credit History' data-desc='This feature allows merchants to view their credit transaction history.'> <button class='btn btn-default'> View more </button></a>
            </div>
            <a > 
                <div class="history-item">
                    <div class="history-content">
                        <div class="history-icon"><img src="/img/logo/logo.png"></div>
                        <div class="ml-4">
                            <h2>Ads Commission</h2>
                            <p>Referral commission from your online store</p>
                        </div>
                    </div>
                    <div class="history-balance">
                        <h2 class="positive">+ 10.00</h2>
                        <p>2021-11-14 08:26 AM</p>
                    </div>
                </div>
            </a>
            <a > 
                <div class="history-item">
                    <div class="history-content">
                        <div class="history-icon"><img src="/img/logo/logo.png"></div>
                        <div class="ml-4">
                            <h2>Sales</h2>
                            <p>Transaction order from your online store</p>
                        </div>
                    </div>
                    <div class="history-balance">
                        <h2 class="positive">+ 50.00</h2>
                        <p>2021-11-13 08:26 AM</p>
                    </div>
                </div>
            </a>
            <a > 
                <div class="history-item">
                    <div class="history-content">
                        <div class="history-icon"><img src="/img/logo/logo.png"></div>
                        <div class="ml-4">
                            <h2>Withdrawal</h2>
                            <p>Merchant credit withdrawal</p>
                        </div>
                    </div>
                    <div class="history-balance">
                        <h2 class="negative">- 20.00</h2>
                        <p>2021-11-12 08:26 AM</p>
                    </div>
                </div>
            </a>
            <a > 
                <div class="history-item">
                    <div class="history-content">
                        <div class="history-icon"><img src="/img/logo/logo.png"></div>
                        <div class="ml-4">
                            <h2>Sales</h2>
                            <p>Transaction order from your online store</p>
                        </div>
                    </div>
                    <div class="history-balance">
                        <h2 class="positive">+ 30.00</h2>
                        <p>2021-11-12 11:26 AM</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1 credit-row-divider"></div>
    <div class='col-sm-12 col-md-12 col-lg-4 col-xl-4'>
        <div class='right-item' >
            <h1 class='title'>Statistic</h1>
            <div class='linechart-canvas' style="width:100%">
                <canvas id="lineChart" class='line-chart' style="height:100%" > </canvas>    
            </div>
        </div>
        <div class='right-item ' >
            <div class='d-flex justify-content-between align-items-center mb-4'>
                <h1 class='title'>Bank Account</h1>
                <button class='btn btn-default under-development' data-title='Bank Account' data-desc='This feature allows merchants to manage their bank account for withdrawal request.'>Manage </button>
            </div>
            <div class='bank-list'>
                <div class='no-record no-bank'>
                    <img src='/img/picture/no_event.png'/>
                    <p>No bank account yet. </p>
                    <button class='btn btn-secondary under-development'  data-title='Bank Account' data-desc='This feature allows merchants to manage their bank account for withdrawal request.' >Manage bank acccount</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('component.chart.setting')
@include('component.chart.singleLine',[
    'id'=>'lineChart',
    'chartTitle' => '',
    'bgStart' => '#231CE4',
    'bgEnd' =>'#FF8355',
    'lineStart' => '#231CE4',
    'lineEnd' => '#FF6A32',
    'data'=> [
        ['label'=> '13 Nov', 'value' => 10],
        ['label'=> '14 Nov', 'value' => 150],
        ['label'=>'15 Nov', 'value' => 300],
        ['label'=>'16 Nov', 'value' => 300],
        ['label'=>'17 Nov', 'value' => 150],
        ['label'=> '18 Nov', 'value' => 700],
    ] 
])

@stop