<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            {!! Form::open(['route' => 'promotion.discount.update']) !!}            
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body ">     
                <input type='hidden' name='editID' id='editID' />  
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-general-tab" data-tab="active" data-type="next" data-next="#pills-applicant-tab"  data-toggle="pill" href="#pills-general">{{translate('general','General')}}</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" id="pills-applicant-tab" data-type="submit" data-toggle="pill" href="#pills-applicant">{{translate('applicable_control','Applicable Control')}}</a>
                    </li>                 
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active " id="pills-general">
                        <div class='row'>
                            <div class='col-12 form-group'>
                                <p> {{translate('discount_type','Discount Type')}} </p>
                                @include('component.toggle',[
                                    'name'=> $metaConfig['discount_type'],
                                    'title1' => translate('percent','Percent') . ' (%)',
                                    'key1' => 'percent',
                                    'title2' =>  translate('fixed','Fixed') . ' (RM)',
                                    'key2' => 'fixed'
                                ])                                
                            </div>
                            <div class='col-12 form-group'>          
                                <p class='required'> {{translate('discount_amount','Discount Amount')}}  </p>
                                <input type='number' step="0.01" min="1" max="99" name="{{$metaConfig['discount_amount']}}" class='form-control' required />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-applicant">
                        <div class='row'>
                            <div class='col-12 form-group'>      
                                <b> {{translate('product','Product')}}  </b>
                                <p>  {{translate('applicant_product_desc','Which product is applicable for the redemption')}}  </p>
                                @include('component.toggle',[
                                    'name'=> $metaConfig['product_type'],
                                    'title1' => translate('specific_product','Specific Product') ,
                                    'key1' => 'specific',
                                    'title2' =>  translate('all_product_except','All Product Except'),
                                    'key2' => 'all'
                                ]) 
                                @include('component.multiselect',['data'=>$productList, 'key'=> $metaConfig['product_list']])    
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


