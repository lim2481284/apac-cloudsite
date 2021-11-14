<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['route' => 'tool.expenses.update']) !!}
            <input type='hidden' name='editID' id='editID' />
            <input type='hidden' name='type' id="typeID"/>
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>
            </div>
            <div class="modal-body row">
                <div class='col-sm-6 form-group'>
                    <p class='required'>{{translate('title','Title')}} </p>
                    <input type='text' name='title' maxlength="80" class='form-control' required/>
                </div>
                <div class='col-sm-6 form-group'>
                    <p>{{translate('description','Description')}} </p>
                    <input type='text' name='description' maxlength="200" class='form-control'/>
                </div>
                <div class='col-sm-6 form-group'>
                    <p class='required'> {{translate('amount','Amount')}} </p>
                    <input type='number' step="0.01" name='amount' min='0' class='form-control ' required/>
                </div>  
                <div class='col-sm-6 form-group'>
                    <p class='required'> Date </p>
                    <input type='date' name='statement_at'  class="form-control datepicker" required/>
                </div>   
            </div>
            <div class="modal-footer">               
                <button  class='btn btn-danger action-btn global-form-btn delete-btn'  type='button'
                    data-toggle="modal" 
                    data-target="#actionModel"
                    data-title="{{translate('delete_record','Delete Record')}}"
                    data-submit-title ="{{translate('delete','Delete')}}"
                    target-id="actionID||actionType" 
                    data-action-route="{{route('tool.expenses.action')}}"
                    value="||delete">
                    {{translate('delete','Delete')}}
                </button>       
                <button class="btn btn-success submit-btn edit-show create-show">{{translate('create','Create')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
