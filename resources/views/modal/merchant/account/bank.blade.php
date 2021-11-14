<div id="bankModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">   
                <h4 class='modal-title'>{{translate('bank_management','Bank Management')}}</h4> 
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body"> 
                    <input type='hidden' value='create' name='action'/>     
                    <div class='add-bank'>
                        <h2> {{translate('add_bank_acc','Add Bank Account')}} </h2>
                        <div class='row'>
                            <div class='col-12 form-group'>
                                <p class='required'>{{translate('bank_name','Bank Name')}} </p>
                                <input type="text" class="form-control" name="{{$metaConfig['bank_name']}}" maxlength="30" required>
                            </div>
                            <div class='col-12 form-group'>
                                <p class='required'>{{translate('owner_name','Owner Name')}} </p>
                                <input type="text" class="form-control" name="{{$metaConfig['bank_owner']}}" maxlength="50" required>
                            </div>
                            <div class='col-12 form-group'>
                                <p class='required'>{{translate('bank_account','Bank Account')}} </p>
                                <input type="text" class="form-control" name="{{$metaConfig['bank_account']}}" maxlength="30" required>
                            </div>
                            <div class='col-12 form-group button-section'>
                                <button class='btn btn-primary add-bank-button' type='button'> {{translate('add','Add')}}  </button>
                            </div>
                        </div>
                    </div>
                <div class='mt-4'>
                    <small>{{translate('my_bank_account','My bank account')}}</small>
                </div>
               
                @if($bankAcc)
                    <div class='bank-list'>
                    @foreach($bankAcc as $index=>$record)
                        <div class='bank-account bank-item{{$index}}'>
                            <div class='bank-info'>
                                <h2> {{ $record->{$metaConfig['bank_name']} }} </h2>
                                <p> {{ $record->{$metaConfig['bank_owner']} }}</p>
                            </div>
                            <div class='bank-balance'>
                                <h3> {{ $record->{$metaConfig['bank_account']} }}
                            </div>
                            <div class='overlay'>
                                <button class='btn btn-danger delete-bank-acc' type='button' value="{{$index}}">{{translate('delete','Delete')}}</button>
                                <div class='background'></div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @endif 
              
            </div>         
        </div>
    </div>
</div>