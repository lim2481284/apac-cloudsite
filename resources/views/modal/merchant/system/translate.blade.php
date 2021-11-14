
<div id="editTranslateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'system.translate.update']) !!}
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class='ti-crown icon-purple'> </i>
                    {{translate('edit_content',"Edit Content")}}
		            <input type='hidden' name='id' id="id"/>
		            <input type='hidden' id="check"/>
                </h4>
            </div>
            <div class="modal-body  row">
                <div class='col-sm-12 form-group'>
                    <p>{{translate('key','key')}} </p>
                    <input type="text" class="form-control edit-note" id="key" name="key" disabled>
                </div>
                <div class='col-sm-12 form-group'>
                    <p>{{translate('english','english')}}</p>
                    <input type="text" class="form-control edit-note" id="en" name="value_en">
                </div>
                <div class='col-sm-12 form-group'>
                    <p>{{translate('chinese','chinese')}}</p>
                    <input type="text" class="form-control edit-note" id="cn" name="value_zh-CN">
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::button(translate('update','Update'),['class'=>'btn btn-success update-translate']) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('cancel','cancel')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>