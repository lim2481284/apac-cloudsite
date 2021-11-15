<div class='col-sm-4'>
    <div class='grid-box-item'>
        <div role="group">
            <button id="btnGroupDrop{{$index}}" type="button" aria-haspopup="true" aria-expanded="false"
                class="btn btn-default menu-tooltip" data-tooltip-content="#tooltip_menu{{$index}}">
                <i class='ti-more-alt'></i>
            </button>
            <div class="tooltip_templates">
                <span id="tooltip_menu{{$index}}" class='tooltip_menus '>
                    <button class='btn btn-primary under-development' data-title='Proceed Order' data-desc='This feature allows merchants to use third-party shipping companies to process orders' type='button'>
                        <i class='ti-truck'> </i> Proceed Order
                    </button>
                    <button class='btn btn-default under-development' data-title='Shipping Tracking' data-desc='This feature allows merchants to keep track of shipping order' type='button'>
                        <i class='ti-location-pin'> </i>
                        Shipping Tracking
                    </button>
                    <button class='btn btn-default under-development' data-title='AWB Receipt' data-desc='This feature allows merchants to print out AWB receipt to proceed shipping' type='button'>
                        <i class='ti-printer'> </i> Print AWB Receipt
                    </button>
                    <button class='btn btn-default under-development' data-title='Order Details' data-desc='This feature allows merchants to view order details' type='button'>
                    <i class='ti-eye'></i>  View Order
                    </button>
                </span>
            </div>
        </div>
        <div class='img-section'> <img src='/img/icon/order_{{$status}}.png'/> </div>
        <div class='content-section'>
            <span class="badge transaction-badge-{{$status}}">{{$statusText}}</span>
            <h1> {{uniqid()}} </h1>
            <div class='detail'>
                <p> 
                    <i class='ti ti-vector'></i> 
                    Delivering
                </p>
                <p> 
                    <i class='ti ti-truck'></i> 
                    {{$deliveryType}}
                </p>
                
                <p> 
                    <i class='ti ti-package'></i> 
                    {{rand(1,10)}} Products
                </p>
                <p> 
                    <i class='ti ti-money'></i> 
                    ${{rand(10,1000)}} 
                </p>
            </div>
            <small class='date'>14-11-2021</small>
        </div>
    </div>
</div>