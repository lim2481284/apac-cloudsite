<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['route' => 'system.announcement.update']) !!}
            <input type='hidden' name='notification_type' value='simple'/>
            <div class="modal-header">
                <h4 class="modal-title">
                </h4>
            </div>
            <div class="modal-body">
                <input type='hidden' name='editID' id='editID' />              
                <input type='hidden' name='mode' id="modeID"/>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-detail-tab" data-tab="active" data-type="next" data-next="#pills-setting-tab"  data-toggle="pill" href="#pills-detail">{{translate('detail','Detail')}}</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab"  data-type="submit" data-toggle="pill" href="#pills-setting">{{translate('setting','Setting')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active " id="pills-detail">
                        <div class='row'>
                            <div class="col-12 form-group">
                                <p>{{translate('annoucement_type','Announcement Type')}}</p>
                                <div class="custom-checkbox-section over-hide z-bigger">
                                    <div class="container pb-5 pt-2">
                                        <div class="row justify-content-center">
                                            <div class="checkbox-flex">
                                                <input class="checkbox-tools" type="radio" name="announcement_type" id="tool-1" data-value='simple' checked>
                                                <label class="for-checkbox-tools" for="tool-1">
                                                    <i class='ti-layout-media-center-alt'></i>
                                                    {{translate('poster','Poster')}}
                                                    <small> {{translate('simple_announcement_explain_','Popup poster announcement with link redirection.')}}</small>
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="announcement_type" data-value='long' id="tool-2">
                                                <label class="for-checkbox-tools" for="tool-2">
                                                    <i class='ti-layout-media-overlay'></i>
                                                    {{translate('rich_content','Rich Content')}}
                                                    <small> {{translate('long_announcement_explain_','Popup Announcement with content management.')}}</small>
                                                </label>                                  
                                                <input class="checkbox-tools" type="radio" name="announcement_type" data-value='top' id="tool-3">
                                                <label class="for-checkbox-tools" for="tool-3">
                                                    <i class='ti-layout-line-solid'></i>
                                                    {{translate('top_bar','Top Bar')}}
                                                    <small> {{translate('top_announcement_explain','Simple top bar announcement.')}}</small>
                                                </label>                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 form-group simple-section">
                                <p>{{translate('picture','Picture')}} </p>
                                @include('component.upload_box',['key'=>'announcement'])
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p class='required'>{{translate('title','Title')}} </p>
                                <input type="text" class="form-control" name="title" maxlength="50" required>
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p>{{translate('description','Description')}} </p>
                                <input type="text" class="form-control" name="description" maxlength="190">
                            </div>      
                            <div class='col-sm-6 form-group simple-section top-section'>
                                <p>{{translate('link','Link')}} </p>
                                <input type="text" class="form-control" name="link" maxlength="190">
                            </div>  
                            <div class="col-sm-6  form-group top-section">
                                <p>{{translate('store_font_size', 'Store Font Size')}}</p>
                                <select name="fontSize" class='form-control' required>
                                    <option value="-5">{{translate('extra_small','Extra Small')}}</option>
                                    <option value="-3">{{translate('small','Small')}}</option>
                                    <option selected value="0">{{translate('standard','Standard')}}</option>
                                    <option value="3">{{translate('large','Large')}}</option>
                                    <option value="5">{{translate('Extra Large','Extra Large')}}</option>
                                </select>
                            </div>    
                            <div class="col-sm-6 form-group top-section">
                                <p class="theme-color-title required">{{translate('font_color', 'Font Color ')}}</p>
                                <input  style="background-color:#000000"  name="fontColor" value="#000000" class="form-control color-picker cms-general-input" />
                            </div>
                            <div class="col-sm-6 form-group top-section">
                                <p class="theme-color-title required">{{translate('background_color', 'Background Color ')}}</p>
                                <input  style="background-color:#000000"  name="bgColor" value="#000000" class="form-control color-picker cms-general-input" />
                            </div>
                           
                            <div class='col-12 form-group long-section'>
                                <hr/>
                                <p >{{translate('content','Content')}} </p>
                                <div class='wysiwyg' id="content">
                                </div>                    
                            </div>  
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-setting">
                        <div class='row'>
                            <div class="form-group col-12">
                                <div class="checkbox-section">
                                    <p class='title'>{{translate('timeline','Timeline')}}</p>
                                    <p>{{translate('timeline_explain','When this announcement post should start and when this announcement post should end ?')}}</p>
                                    <div class='checkbox-input-hidden hide-section'>
                                        <div class='row'>
                                            <div class="form-group col-sm-6">
                                                <input type="date"  class="datepicker form-control " name="start" placeholder="{{translate('start_date','Start Date')}}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <input type="date"  class="datepicker form-control " name="end" placeholder="{{translate('end_date','End Date')}}">
                                            </div>
                                        </div>                                                                           
                                    </div>    
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='timeline'>
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




<div id="announcementModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <input name='deleteID' id='deleteID' type='hidden' />
            <div class="modal-header">                
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>
            </div>
            <div class="modal-body row" id="announcementViewContent">            
                        
            </div>         
        </div>
    </div>
</div>