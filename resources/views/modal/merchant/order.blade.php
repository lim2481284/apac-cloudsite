<div id="shippingModel" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <input type='hidden' id='serviceCourier' class='clear-input'/>
            {!! Form::open(['route' => 'order.shipping.create','id'=>'deliveryOrderForm']) !!}
                <input type='hidden' name='service_id' class='clear-input'/>
                <input type='hidden' class='clear-input' name='service_type'/>
                <input type='hidden' name='pick_point' class='clear-input'/>
                <input type='hidden' name='send_point' class='clear-input'/>
                <input type='hidden' name='service_type' class='clear-input'/>
                <input type='hidden' name='service_name' class='clear-input'/>
                <input type='hidden' name='delivery_fee' class='clear-input'/>
                <input type='hidden' name='transaction_id' />
                <input type='hidden' name='value'/>
                <div class="modal-header">                      
                    <h4 class="modal-title">      
                        {{translate('process_order_shipping','Process Order Shipping')}}
                    </h4>
                    <div class='text-right point-icon'>
                        <span>{{getMerchantCredit()}}</span><img src='/img/icon/coin.png' />
                    </div>
                </div>
                <div class="modal-body  row">    
                   
                    <div class='col-12 mt-4'> <h6> {{translate('sender_info')}} </h6></div>
                    @include('component.input_group',['data'=>getConfig('easyparcel.sender_form_input')])
                    <div class='form-group col-sm-6'>
                        <p>
                            {{translate('update_as_default_add','Update as default address')}}
                        </p>
                        <input type="checkbox" class="switch custom-toggle"  value='1' id="updateDefault" >
                    </div>
                    <div class='col-12 mt-4'> <h6> {{translate('receiver_info')}} </h6></div>
                    @include('component.input_group',['data'=>getConfig('easyparcel.receiver_form_input')])
                    <div class='col-12 mt-4'> <h6> {{translate('parcel_info')}} </h6></div>    
                    @include('component.input_group',['data'=>getConfig('easyparcel.parcel_info')])
                </div>
                <div class="modal-footer">
                    {!! Form::button(translate('next','Next'),['class'=>'check-rate-btn btn btn-primary ']) !!}
                    <button type="button" class="btn btn-default"  data-dismiss="modal">{{translate('cancel','Cancel')}}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>



<div id="rateModel" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">                      
                <h4 class="modal-title">                    
                    {{translate('shipping_rate_checking','Shipping Rate Checking')}} 
                </h4>
                <div class='text-right point-icon'>
                    <span>{{getMerchantCredit()}}</span><img src='/img/icon/coin.png' />
                </div>
            </div>
            <div class="modal-body  row">
                <div class='col-12'>
                    <div class="alert alert-info" role="alert">
                        {{translate('easyparcel_rate_desc')}}
                    </div>
                </div>
                <div class='col-12'>
                    <div class="alert alert-danger" role="alert">
                        {{translate('easyparcel_order_warning')}}
                    </div>
                </div>   
                <div class='col-sm-12 form-group mt-4'>
                    <p>{{translate('select_shipping_service',' Please select which shipping service you want to use below')}}</p>
                </div>    
                <div class='col-12 '>
                    <div class='row shipping-service-section'></div>     
                    <div id='rateTemplate' class='hide col-12'>
                        <div class='shipping-service-item'>
                            <div class='row'>
                                <div class='col-sm-3 flex-section'>
                                    <img class='courier_logo' src=""/> 
                                </div>
                                <div class='col-sm-1'></div>
                                <div class='col-sm-8'>
                                    <span class="badge badge-primary service-type"></span>
                                    <h1 class='service-title'> </h1>
                                    <p class="service-requirement"></p>
                                    <p class="service-pickupdate"></p>
                                    <p class="service-schedule"></p>
                                    <p class="service-duration"></p>
                                    <p class='service-rate'></p>
                                </div>
                                <div class='col-12 hidden-section'>
                                    <p class='dropoff-select-hide'>  {{translate('drop_off_point','Drop off Point')}}  </p>
                                    <select class='dropoff-select dropoff-select-hide form-control mb-3'>
                                        <option value='' selected disabled> {{translate('select_drop_off_point','Please select dropoff point ')}}  </option>
                                    </select>
                                    <p class='pickup-select-hide'>  {{translate('pickup_point','Pickup Point')}}  </p>
                                    <select class='pickup-select pickup-select-hide form-control'>
                                        <option value='' selected disabled> {{translate('select_pickup_point','Please select pickup point ')}}  </option>
                                    </select>
                                    <div class='d-flex justify-content-end mt-3'>
                                        <button class='btn btn-primary create-order-btn'> {{translate('select_this_service','Select this service')}} <i class='ti-arrow-right pl-2'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
                                           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default "
                    data-dismiss="modal">{{translate('cancel','Cancel')}}</button>
            </div>            
        </div>
    </div>
</div>



<div id="shippingOrderModel" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">                      
                <h4 class="modal-title">    
                    {{translate('shipping_order_details','Shipping Order Details')}}
                </h4>
            </div>
            <div class="modal-body  ">               
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-info-tab" data-toggle="pill" href="#pills-info" role="tab" aria-controls="pills-info" aria-selected="true">{{translate('order_info','Order Info')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">{{translate('order_detail','Order Details')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class='row'>
                            @include('component.input_group',['data'=>getConfig('easyparcel.order_info'), 'readonly'=>true])
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class='row'>
                            <div class='col-12'> <h6> {{translate('sender_info')}} </h6></div>
                            @include('component.input_group',['data'=>getConfig('easyparcel.sender_form_input'), 'readonly'=>true])
                            <div class='col-12 mt-4'> <h6> {{translate('receiver_info')}} </h6></div>
                            @include('component.input_group',['data'=>getConfig('easyparcel.receiver_form_input'), 'readonly'=>true])
                            <div class='col-12 mt-4'> <h6> {{translate('parcel_info')}} </h6></div>    
                            @include('component.input_group',['data'=>getConfig('easyparcel.parcel_info'), 'readonly'=>true])
                        </div>
                    </div>
                </div>                            
            </div>
            <div class="modal-footer">                
                <a href='' data-name='awb_link' target="_blank"><button type="button" class="btn btn-default">
                    <i class='ti-receipt pr-2'></i> {{translate('print_awb_','Print AWB')}}
                </button></a>                
                <a href='' data-name='tracking' target="_blank"><button type="button" class="btn btn-default ">
                    <i class='ti-truck pr-2'></i> {{translate('tracking','Tracking')}}
                </button></a>
                <button type="button" class="btn btn-default " data-dismiss="modal">{{translate('close','Close')}}</button>
            </div>           
        </div>
    </div>
</div>