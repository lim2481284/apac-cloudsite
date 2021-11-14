<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['route' => 'product.category.update']) !!}          
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body row">
                <input type='hidden' name='editID' id='editID' />
                <div class="col-12 form-group"> 
                    <p >{{translate('cover_picture','Cover Picture')}}  - {{translate('recommended_size_31','Recommended Size ( 300 X 100 px ) ( 3:1 Ratio )')}}</p>
                    @include('component.upload_box',['key'=>'category'])
                </div> 
                <div class='col-12 form-group'>
                   <hr/>
                </div>
                <div class='col-12 form-group'>
                    <p class='required'>{{translate('category_title','Category Title')}} </p>
                    <input type="text" class="form-control" name="title"  maxlength="30" required>
                </div>    
                <div class='col-12 form-group'>
                    <p>{{translate('product_category_select','Product - select product that under this category')}} </p>
                    @include('component.multiselect',['data'=>$productArr, 'key'=>'product'])    
                </div>                       
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('cancel','cancel')}}</button>
                <button class="btn btn-success submit-btn edit-show create-show">{{translate('create','Create')}}</button>                           
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
