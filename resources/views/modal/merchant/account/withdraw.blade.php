

<div id="bankModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'account.credit.withdraw.submit', 'id'=>'withdrawForm']) !!}  
            <input type='hidden' value='bankID' name='bankID'/>     
            <input type='hidden' value='amount' name='amount'/>     

            <div class="modal-header">   
                <h4 class='modal-title'>{{translate('withdraw_summary','Withdrawal Summary')}}</h4> 
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body row"> 
                <div class='col-12 form-group'>
                    <div class='withdraw-detail mb-4'>
                        <div class='row'>
                            <div class='col-12 d-flex mb-4 mt-4 justify-content-between'>
                                <p>{{translate('current_credit','Current Credit')}}</p> 
                                <div>
                                    <b>{{getMerchantCredit()}}</b>
                                    <img src='/img/icon/coin.png'/>
                                </div>
                            </div>
                            <div class='col-12 d-flex mb-4 justify-content-between'>
                                <p>{{translate('withdraw_amount','Withdrawal Amount')}}</p> 
                                <div>
                                    <b id="withdrawAmount">{{getMerchantCredit()}}</b>
                                    <img src='/img/icon/coin.png'/>
                                </div>
                            </div>
                            <div class='col-12 d-flex mb-4 justify-content-between'>
                                <p>{{translate('credit_after_withdraw','Credit after Withdraw')}}</p> 
                                <div>
                                    <b  id="withdrawBalance">{{getMerchantCredit()}}</b>
                                    <img src='/img/icon/coin.png'/>
                                </div>
                            </div>
                        </div>
                    </div>                  
                </div>  
                <div class='col-12 form-group'><hr/></div>
                <div class='col-12 form-group'>
                    <p>{{translate('bank_account','Bank Account')}} </p>
                    <button class='select-btn form-control' data-dropdown="#dropdown-with-icons" type='button'><span class='select-text'>{{translate('pselect_bank_account','Please select bank account')}}</span><i class='ti-angle-down'></i></button>
                    <div class='text-right'>
                        <a href='#' id='bankManagement'><small>{{translate('manage_bank_account')}}</small></a>
                    </div>

                    <div class="dropdown-menu dropdown-anchor-top-left dropdown-has-anchor" id="dropdown-with-icons">
                        <ul>
                            <li data-id="-1">{{translate('new_bank',"New bank account")}}</li>
                            @if($bankAcc)
                                @foreach($bankAcc as $index=>$record)
                                <li data-id ="{{$index}}">
                                    <div class='bank-info'>
                                        <h2> {{ $record->{$metaConfig['bank_name']} }} </h2>
                                        <p> {{ $record->{$metaConfig['bank_owner']} }}</p>
                                    </div>
                                    <div class='bank-balance'>
                                        <h3> {{ $record->{$metaConfig['bank_account']} }}
                                    </div>
                                    <button class='btn btn-default delete-bank-btn' type='button' value="{{$index}}"><i class='ti ti-trash'></i>{{translate('delete','Delete')}}</button> 
                                </li>
                                @endforeach
                            @endif 
                        </ul>
                    </div>
                </div>
                <div class='col-12 form-group hide new-bank-section'>
                        <div class='add-bank' id='addSection'>
                            <h2> {{translate('new_bank_acc','New Bank Account')}} </h2>
                            <div class='row'>
                                <div class='col-12 form-group'>
                                    <p class='required'>{{translate('bank_name','Bank Name')}} </p>
                                    <input type="text" class="form-control" name="{{$metaConfig['bank_name']}}" maxlength="30" >
                                </div>
                                <div class='col-12 form-group'>
                                    <p class='required'>{{translate('owner_name','Owner Name')}} </p>
                                    <input type="text" class="form-control" name="{{$metaConfig['bank_owner']}}" maxlength="50" >
                                </div>
                                <div class='col-12 form-group'>
                                    <p class='required'>{{translate('bank_account','Bank Account')}} </p>
                                    <input type="text" class="form-control" name="{{$metaConfig['bank_account']}}" maxlength="30" >
                                </div>                              
                            </div>
                        </div>
                </div>
                
            </div>     
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('cancel','cancel')}}</button>
                <button class="btn btn-primary confirm-withdraw" type='button'>{{translate('confirm_withdraw','Confirm Withdraw')}}</button>
            </div>
            {!! Form::close() !!}    
        </div>
    </div>
</div>