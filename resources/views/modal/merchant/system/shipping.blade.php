<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['route' => 'system.shipping.update']) !!}
            <input type='hidden' name='{{$shippingMeta["shipping_method"]}}' value='1'/>
            <div class="modal-header">
                <h4 class="modal-title"> </h4>
            </div>
            <div class="modal-body">
                <input type='hidden' name='editID' id='editID' />
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-detail-tab" data-tab="active" data-type="next" data-next="#pills-setting-tab" data-toggle="pill" href="#pills-detail">{{translate('detail','Detail')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-type="submit" data-toggle="pill" href="#pills-setting">{{translate('shipping_setting','Shipping Setting')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active " id="pills-detail">
                        <div class='row'>                                                                                                
                            <div class='col-12 form-group'>
                                <p class='required'>{{translate('shipping_name','Shipping Name')}} </p>
                                <input type="text" class="form-control" name="shipping_name" maxlength="50" required>
                                <small> {{translate('shipping_name_desc','What is shipping name')}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-setting">
                        <div class='row'>
                            <div class="form-group col-12">
                                <div class="checkbox-section">
                                    <p class='title'>{{translate('supported_state','Supported State')}}</p>
                                    <p>{{translate('supported_state_desc','Supported State desc')}}</p>
                                    @include('component.multiselect',['data'=>$states, 'key'=>'state'])
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <hr />
                            </div>
                            <div class="form-group col-12">
                                <div class="checkbox-section">
                                    <p class='title'>{{translate('shipping_calculation','Shipping Calculation')}}</p>
                                    <p>{{translate('shipping_calculation_desc','Shipping Calculation desc')}}</p>
                                    <div class="custom-checkbox-section over-hide z-bigger">
                                        <div class="container pb-5 pt-2">
                                            <div class="row justify-content-center">
                                                <div class="checkbox-flex">
                                                    @foreach ($shippingMethods as $method => $key)
                                                        <input class="checkbox-tools" type="radio" name="shipping_method" id="method-{{$key}}" data-value='{{$key}}' {{($loop->first)?'checked':''}} data-toggle='{{($method=="flat")?"flat":"rate"}}'>
                                                        <label class="for-checkbox-tools" for="method-{{$key}}">
                                                            <i class='ti-{{translate($method."_icon")}}'></i>
                                                            {{translate($method, $method)}}
                                                            <small> {{translate($method.'_desc',$method." description")}}</small>
                                                        </label>
                                                    @endforeach                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 method-toggle">
                                <div class='row'>
                                    <div class='col-12 toggle rate-toggle'>
                                        <!-- <canvas id="ctx" width="900" height="70px" class='mb-4 '></canvas> -->
                                        <div class="form-row">
                                            <div class="col-sm-3">
                                                <p>{{translate('min','Min')}}</p>
                                            </div>
                                            <div class="col-sm-3">
                                                <p>{{translate('max','Max')}}</p>
                                            </div>
                                            <div class="col-sm-5">
                                                <p>{{translate('fee_amount','Fee Amount (MYR)')}}</p>
                                            </div>
                                        </div>
                                        <div id="unitBox" >
                                            <div class="form-row unit-group">
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" name="{{$shippingMeta["from_condition"]}}[]" readonly/>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" name="{{$shippingMeta["to_condition"]}}[]" />
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="number" class="form-control" name="{{$shippingMeta["fee"]}}[]" />
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-link delete-unit-btn"><i class='ti-trash'></i></button>
                                                </div>
                                            </div>
                                            <div class="form-row unit-group">
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" name="{{$shippingMeta["from_condition"]}}[]" readonly/>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="{{$shippingMeta["to_condition"]}}[]" readonly/>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="number" class="form-control" name="{{$shippingMeta["fee"]}}[]" />
                                                </div>
                                            </div>
                                        </div>
                                                                                         
                                        <button type='button' id="addUnit" class='btn circle-btn mt-3 mb-4'> 
                                            <i class='ti-plus'> </i>
                                            <span>{{translate('add_unit','Add Unit')}}</span>
                                        </button>
                                    </div>
                                    <div class='col-sm-6 toggle flat-toggle'>
                                        <p class='required'>{{translate('per_order_rate','Per Order Rate')}}</p>
                                        <input type="number" class="form-control " name="{{$shippingMeta["per_order_rate"]}}" />
                                        <small> {{translate('additional_rate_desc','Additional rate description')}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <hr />
                            </div>
                            <div class="form-group col-12">
                                <div class="checkbox-section">
                                    <p class='title'>{{translate('enable_free_shipping','Enable Free Shipping')}}</p>
                                    <div class='checkbox-input-hidden hide-section'>
                                        <p class='required'>{{translate('free_shipping_desc','Free Shipping when order total amount equal or above')}}</p>
                                        <input type="number" min='0' class="form-control" name="{{$shippingMeta["free_shipping_target"]}}" value="0" required/>
                                    </div>    
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='{{$shippingMeta["free_shipping_check"]}}'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('cancel','cancel')}}</button>
                <button class="btn btn-primary-light submit-btn edit-show create-show">{{translate('create','Create')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>