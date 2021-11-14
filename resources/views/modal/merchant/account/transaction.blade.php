<div id="transactionModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">                                       
                </h4>
            </div>
            <div class="modal-body row">
                <input type='hidden' name='editID' id='editID' />
                <input type='hidden' name='mode' id="modeID"/>
                <div class='col-sm-6 form-group'>
                    <p class='required'>{{translate('order_code','Order Code')}} </p>
                    <input type="text" class="form-control" name="order_code"   maxlength="50" required>
                </div>
                <div class='col-sm-6 form-group'>
                    <p class='required'>{{translate('transaction_code','Transasction Code')}} </p>
                    <input type="text" class="form-control" name="transaction_code"  maxlength="50" required>
                </div>   
                <div class='col-sm-6 form-group'>
                    <p class='required'>{{translate('amount','Amount')}} </p>
                    <input type="text" class="form-control" name="amount"  maxlength="50" required>
                </div>    
                <div class='col-sm-6 form-group'>
                    <p class='required'>{{translate('credit_balance','Credit Balance')}} </p>
                    <input type="text" class="form-control" name="balance"  maxlength="50" required>
                </div> 
                <div class='col-sm-6 form-group'>
                    <p class='required'>{{translate('description','Description')}} </p>
                    <input type="text" class="form-control" name="description" maxlength="50" required>
                </div>
                <div class='col-sm-6 form-group'>
                    <p class='required'>{{translate('remarks','Remarks')}} </p>
                    <input type="text" class="form-control" name="remark" maxlength="50" required>
                </div>    
                <div class='col-sm-6 form-group'>
                    <p class='required'>{{translate('status','Status')}} </p>
                    <input type="text" class="form-control" name="transaction_status" maxlength="50" required>
                </div>   
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-primary" data-dismiss="modal">{{translate('close','Close')}}</button>                        
            </div>
        </div>
    </div>
</div>
