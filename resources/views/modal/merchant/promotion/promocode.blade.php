<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['route' => 'promotion.promocode.update']) !!}
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <input type='hidden' name='editID' id='editID' />              
                <input type='hidden' name='mode' id="modeID"/>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-general-tab" data-tab="active" data-type="next" data-next="#pills-applicant-tab"  data-toggle="pill" href="#pills-general">{{translate('general','General')}}</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" id="pills-applicant-tab" data-type="next" data-next="#pills-setting-tab"  data-toggle="pill" href="#pills-applicant">{{translate('applicable_control','Applicable Control')}}</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab"  data-type="submit" data-toggle="pill" href="#pills-setting">{{translate('setting','Setting')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active " id="pills-general">
                        <div class="row">
                            <div class='col-sm-6 form-group'>
                                <p class='required'> {{translate('code','Code')}} </p>
                                <input type='text' name='code' maxlength="15" class='form-control' required />
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p class='required'> {{translate('title','Title')}}</p>
                                <input type='text' name='{{$metaConfig["promotion_name"]}}'  maxlength="30" class='form-control' required />
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p> {{translate('description','Description')}} </p>
                                <input type='text' name='{{$metaConfig["promotion_description"]}}'  maxlength="50" class='form-control' />
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p> {{translate('start_date','Start Date')}} </p>
                                <input type='date' name='{{$metaConfig["start_date"]}}' class='datepicker form-control' />
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p> {{translate('end_date','End Date')}} </p>
                                <input type='date' name='{{$metaConfig["end_date"]}}' class='datepicker form-control' />
                            </div>
                            <div class='col-12 form-group'>
                                <hr />
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p> {{translate('discount_type','Discount Type')}} </p>
                                @include('component.toggle',[
                                    'name'=> $metaConfig['discount_type'],
                                    'title1' => translate('percent','Percent') . ' (%)',
                                    'key1' => 'percent',
                                    'title2' =>  translate('fixed','Fixed') . ' (RM)',
                                    'key2' => 'fixed'
                                ])                                
                            </div>
                            <div class='col-sm-6 form-group'>          
                                <p class='required'> {{translate('discount_amount','Discount Amount')}}  </p>
                                <input type='number' step="0.01" min="1" max="99" name="{{$metaConfig['discount_amount']}}" class='form-control' required />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-applicant">
                        <div class='row'>
                            <div class='col-sm-12 form-group'>
                                <b> {{translate('user','User')}}  </b>
                                <p>  {{translate('applicant_user_desc','Which user can redeem this promo code')}}  </p>
                                @include('component.toggle',[
                                    'name'=> $metaConfig['user_type'],
                                    'title1' => translate('specific_user','Specific User'),
                                    'key1' => 'specific',
                                    'title2' =>  translate('all_user_except','All User Except'),
                                    'key2' => 'all'
                                ])     
                                @include('component.multiselect',['data'=>$userList, 'key'=>$metaConfig['user_list']]) 
                            </div>
                            <div class='col-sm-12 form-group'>
                                <hr />
                                <b> {{translate('product','Product')}}  </b>
                                <p>  {{translate('applicant_product_desc','Which product is applicable for the redemption')}}  </p>
                                @include('component.toggle',[
                                    'name'=> $metaConfig['product_type'],
                                    'title1' => translate('specific_product','Specific Product') ,
                                    'key1' => 'specific',
                                    'title2' =>  translate('all_product_except','All Product Except'),
                                    'key2' => 'all'
                                ])                                    
                                @include('component.multiselect',['data'=>$productList, 'key'=>$metaConfig['product_list']])                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-setting">
                        <div class='row'>
                            <div class='col-sm-6 form-group'>                               
                                <div class="checkbox-section">
                                    <p class='title'>  {{translate('min_pur','Minimum Purchase')}}  </p>
                                    <p>  {{translate('min_pur_desc','Does this promocode need to meet the minimum purchase amount to use?')}}  </p>
                                    <div class='checkbox-input-hidden hide-section'>
                                        <input type='number' step="0.01" placeholder="{{translate('min_pur_place','Please insert min purchase amount')}}" name='{{$metaConfig["minimum_purchase"]}}' class='form-control'/>
                                    </div>   
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='{{$metaConfig["minimum_purchase"]}}_c'>
                                </div>                              
                            </div>
                            <div class='col-sm-6 form-group'>
                                <div class="checkbox-section">
                                    <p class='title'>  {{translate('max_pur','Maximum Purchase')}}  </p>
                                    <p>  {{translate('max_pur_desc','Does this promocode have maximum purchase amount limit?')}}  </p>
                                    <div class='checkbox-input-hidden hide-section'>
                                        <input type='number' step="0.01" placeholder="{{translate('max_pur_place','Please insert max purchase amount')}}" name='{{$metaConfig["maximum_purchase"]}}' class='form-control'/>
                                    </div>   
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='{{$metaConfig["maximum_purchase"]}}_c'>
                                </div>                                     
                            </div>
                            <div class='col-sm-6 form-group'>
                                <div class="checkbox-section">
                                    <p class='title'>  {{translate('ttl_issue','Total Issues Limit')}}  </p>
                                    <p>  {{translate('ttl_issue_desc','Does this promocode has unit issues limit ( number of times this promocode can be used ) ?')}}  </p>
                                    <div class='checkbox-input-hidden hide-section'>
                                        <input type='number' step="0.01" placeholder="{{translate('ttl_issue_place','Please insert number of unit')}}" name='{{$metaConfig["total_issues_limit"]}}' class='form-control'/>
                                    </div>   
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='{{$metaConfig["total_issues_limit"]}}_c'>
                                </div>                                   
                            </div>
                            <div class='col-sm-6 form-group'>
                                <div class="checkbox-section">
                                    <p class='title'>  {{translate('dl_issue','Daily Issues Limit')}}  </p>
                                    <p>  {{translate('dl_issue_desc','Does this promocode has daily unit issues limit ( number of times this promocode can be used daily ) ?')}}  </p>
                                    <div class='checkbox-input-hidden hide-section'>
                                        <input type='number' step="0.01" placeholder="{{translate('dl_issue_place','Please insert number of unit')}}" name='{{$metaConfig["daily_issues_limit"]}}' class='form-control'/>
                                    </div>   
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='{{$metaConfig["daily_issues_limit"]}}_c'>
                                </div>                                   
                            </div>
                            <div class='col-sm-6 form-group'>
                                <div class="checkbox-section">
                                    <p class='title'>  {{translate('user_issue','User Issues Limit')}}  </p>
                                    <p>  {{translate('user_issue_desc','Does this promocode has unit issues limit for every user ( number of times this promocode can be used per user ) ?')}}  </p>
                                    <div class='checkbox-input-hidden hide-section'>
                                        <input type='number' step="0.01" placeholder="{{translate('user_issue_place','Please insert number of unit')}}" name='{{$metaConfig["user_issues_limit"]}}' class='form-control'/>
                                    </div>   
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='{{$metaConfig["user_issues_limit"]}}_c'>
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


