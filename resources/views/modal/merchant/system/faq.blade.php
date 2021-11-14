
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['route' => (isset($statusArr))?'system.faq.update':'system.faq.category.update']) !!}
          
            <div class="modal-header">
                <h4 class="modal-title">                                    
                </h4>
            </div>
            <div class="modal-body row">
                <input type='hidden' name='editID' id='editID' />
                <input type='hidden' name='mode' id="modeID"/>
                @if(isset($statusArr))
                <div class='col-6 form-group'>
                    <p class='required'>{{translate('category','Category')}} </p>
                    {{Form::select('category',[''=>translate('please_select_category','Please select category')] + $faqCategory , null , ['class'=>'form-control' ,'required'=>'required'])}}
                    <small>{{translate('faq_lang_explain','FAQ Language is based on selected category')}}</small>
                </div>
                @endif
                <div class='col-sm-6 form-group'>
                    <p class='required'>{{translate('title','Title')}} </p>
                    <input type="text" class="form-control" name="title"  maxlength="50" required>
                </div>       
                @if(!isset($statusArr))
                <div class='col-sm-6 form-group'>
                    <p>{{translate('description','Description')}} </p>
                    <input type="text" class="form-control" name="description"  maxlength="190">
                </div>       
                @else                                 
                       
                <div class='col-12 form-group'>
                    <p class='required'>{{translate('content','Content')}} </p>
                    <div class='wysiwyg' id="content">
                    </div>                    
                </div>
                @endif                
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('cancel','cancel')}}</button>
                <button class="btn btn-success submit-btn edit-show create-show">{{translate('create','Create')}}</button>                           
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>