<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['route' => 'system.staff.update']) !!}
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body ">
                <input type='hidden' name='editID' id='editID' />              
                <input type='hidden' name='mode' id="modeID"/>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-detail-tab" data-tab="active" data-type="next" data-next="#pills-setting-tab"  data-toggle="pill" href="#pills-detail">{{translate('detail','Detail')}}</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab"  data-type="submit" data-toggle="pill" href="#pills-setting">{{translate('permission','Permission')}}</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active " id="pills-detail">
                        <div class='row'>
                            <div class='col-sm-6 form-group'>
                                <p class='required'>{{translate('name','Name')}}</p>
                                <input type="text" class="form-control" name="name" maxlength="100" required>
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p class='required'>{{translate('email','Email')}}</p>
                                <input type="email" class="form-control" name="email" maxlength="100" required>
                            </div>
                            <div class='col-sm-12 form-group'>
                            <hr>
                            <small id='passwordNote'>{{translate('update_pass_text','Leave password field empty if you dont want to change password.')}}</small>
                            </div>
                            <div class='col-sm-6 form-group password-section'>
                                <p class='required'>{{translate('password','Password')}} </p>
                                <input type="password" class="form-control" name="password" maxlength="100"  required>
                            </div>             
                            <div class='col-sm-6 form-group password-section'>
                                <p class='required'>{{translate('conf_password','Confirm Password')}}</p>
                                <input type="password" class="form-control" name="confirm_password" maxlength="100"  required>
                            </div>  
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-setting">
                    
                        <div class='row'>
                            <div class="form-group col-12">
                                <div class="checkbox-section">
                                    <p class='title'>{{translate('full_access','Full Access')}}</p>
                                    <p>{{translate('full_access_explain','Does this staff have full system access?')}}</p>
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='full_access' >
                                </div>
                            </div>
                            <div class='col-12 form-group'>
                                <div class='permission-section'>
                                    <hr/>
                                    <p>{{translate('permission_access','Permission Access')}} </p>
                                    <div class='row'>                            
                                        @foreach($systemModuleList as $key=>$module)
                                        <div class='col-sm-6'>                                            
                                            <div class="checkbox-section">
                                                <p class='title'>{{translate($module, $module)}}</p>
                                                <p>{{translate($module."_explain",$module. ' Explaination')}}</p>
                                                <div class='checkbox-input-hidden hide-section'>
                                                    @include('component.toggle',['name'=>$key . '_access','title1'=>translate('viewer','Viewer'),'key1'=>'v','key2'=>'e','title2'=>translate('editor','Editor')])
                                                </div>   
                                                <input type="checkbox" class="switch custom-toggle" value='1' name="{{$key}}_check">
                                            </div>
                                        </div>                                        
                                        @endforeach
                                    </div>                        
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
