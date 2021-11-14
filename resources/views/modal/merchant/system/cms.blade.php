
<div id="pageModal" loading="lazy" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">   
                <h4 class="modal-title">{{translate('page_select','Page Management')}}</h4>
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">  
              
                <div id="pageBox">
                    <p class='subtitle'> {{translate('page_navigation', 'Page Navigation')}} </p>
                    @foreach($layout['page'] as $key => $page )
                        @php($isLock = in_array($key,['home','store']))
                        <div class="pages-item {{($currentPage == $key)?'current':''}}">
                            <div class='page-name'>
                                <i class='ti-move mr-4'></i>
                                <input name="pageID" value="{{$key}}" type='hidden' class='cms-page-input-{{$key}}'/>
                                <input name="name" value="{{$page['name']}}" class='cms-page-input-{{$key}} form-control' readonly/>
                            </div>
                            <div class='edit-confirm'>
                                <button class='btn btn-link cms-action-btn toggle-edit mr-3' data-toggle='false' data-action='edit_page' data-target="cms-page-input-{{$key}}"> <i class='ti-check'></i> </button>
                            </div>
                            <div class='page-button-section'>
                                <button class='btn btn-link toggle-edit mr-3' data-toggle='true'> <i class='ti-pencil'></i> </button>
                                @if(!$isLock)
                                    <button class='btn btn-link cms-action-btn mr-3' data-action='delete_page' data-target="cms-page-input-{{$key}}"> <i class='ti-trash'></i> </button>
                                @endif                                
                                <a href="{{route('system.cms.index', ['page'=>$key])}}" class='mr-3 page-manage-btn'>
                                    <button class='btn btn-link'> <i class='ti-ruler-pencil'></i> {{translate('manage','Manage')}} </button>
                                </a>                 
                            </div>
                        </div>
                    @endforeach
                  
                </div>
                <div class="pages-item add-page-item hide">
                    <div class='page-name'>
                        <input name="name" placeholder="{{translate('page_name_place','Insert your page name')}}"  class='cms-add-input form-control'/>
                    </div>
                    <div class='page-button-section'>
                        <button class='btn btn-link cms-action-btn mr-3' data-action='add_page' data-target="cms-add-input"> <i class='ti-check'></i> </button>
                    </div>
                </div>        
                <button class='btn circle-btn mt-2 add-page-btn' >
                    <i class='ti-plus'> </i>
                    <span>{{translate('add_page','Add Page')}}</span>
                </button>
     
            </div>
        </div>
    </div>
</div>


<div id="blockModal" class="modal fade" role="dialog">
    <div class="modal-dialog xl">
        <div class="modal-content">
            <div class="modal-header">   
                <h4 class="modal-title">{{translate('add_page_block','Add Page Block')}}</h4>
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">  
                <div class='inner-loader'><img src='/img/icon/ajax-loader.gif'/></div>
                <div class='row' id="blockContainer">
                    <div class='col-sm-3'>
                        <div class="nav flex-column nav-pills" id="codeBlockTab">
                            <a class="nav-link active" id="blockCoverTab" data-filter=".mix-cover" data-toggle="pill" href="#">
                                <i class='ti-layout-media-overlay-alt-2'></i>
                                {{translate('intro_cover','Intro & Cover')}}
                            </a>
                            <a class="nav-link" id="blockHighlightTab" data-filter=".mix-highlight" data-toggle="pill" href="#" >
                                <i class='ti-layout-media-center'></i>
                                {{translate('highlitghed_content','Highlighted Content')}}
                            </a>
                            <a class="nav-link" id="blockInfoTab" data-filter=".mix-info" data-toggle="pill" href="#" >
                                <i class='ti-layout-media-right-alt'></i>
                                {{translate('info_content','Info Content')}}
                            </a>
                            <a class="nav-link" id="blockContactTab" data-filter=".mix-contact" data-toggle="pill" href="#" >
                                <i class='ti-layout-list-large-image'></i>
                                {{translate('contact','Contact')}}
                            </a>
                            <a class="nav-link" id="blockProductTab" data-filter=".mix-product" data-toggle="pill" href="#" >
                                <i class='ti-package'></i>
                                {{translate('products','Products')}}
                            </a>
                            <a class="nav-link" id="blockCategoryTab" data-filter=".mix-category" data-toggle="pill" href="#" >
                                <i class='ti-view-grid'></i>
                                {{translate('category','Category')}}
                            </a>
                            <a class="nav-link" id="blockCollectionTab" data-filter=".mix-collection" data-toggle="pill" href="#" >
                                <i class='ti-layout-grid3'></i>
                                {{translate('collection','Collection')}}
                            </a>
                            <a class="nav-link" id="blockSpecialTab" data-filter=".mix-special" data-toggle="pill" href="#" >
                                <i class='ti-star'></i>
                                {{translate('special','Special')}}
                            </a>
                        </div>
                    </div>
                    <div class='col-sm-9 block-item-section'>
                        <div class='row'>
                            @foreach($codeBlocks as $key=>$block)
                                <div class='col-sm-6 block-mix  mix-{{$block['category']}}'>
                                    <div class="block-item"  data-key="{{$key}}" data-sub="{{isset($block['uniqueCategory'])?$block['uniqueCategory']:''}}">
                                        <img src='/img/cms/{{$key}}.png'/>
                                        <h4 class='title'> {{translate('title_'.$key)}} </h4>
                                        <p class='description'> {{translate('description_'.$key)}}</p>
                                    </div>
                                </div>
                            @endforeach 
                        </div>
                    </div>
                </div>     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('cancel','cancel')}}</button>
                <button class="btn btn-primary-light" id="addBlock">{{translate('add','Add')}}</button>
            </div>
        </div>
    </div>
</div>



<div id="themeModal" class="modal fade" role="dialog">
    <div class="modal-dialog xl">
        <div class="modal-content">
            <div class="modal-header">   
                <h4 class="modal-title">{{translate('change_store_theme','Change Store Theme')}}</h4>
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">            
                <div class='row'>
                @foreach($themes as $key => $theme)           
                    @php($selected = ($layout["theme"] == $theme["theme"]) ) 
                    <div class="col-sm-6">
                        <div class='theme-item {{($selected)?"selected":""}}'  style="background: url('/img/cms/{{$theme['theme']}}.png')">
                            {!! Form::open(['route' =>'system.cms.action']) !!}
                                <input type="hidden" name="action" value = "update_theme"/>
                                <input type="hidden" name="theme" value = "{{$key}}"/>
                                <div class='overlay-content'>
                                    @if($selected)
                                        <button type='button' class="btn">{{translate('current_theme', 'Current Theme')}}</button>
                                    @endif
                                    <h1>{{translate($theme['theme'])}} </h1>
                                    <p>{{translate($theme['theme']."_desc")}}</p>                                   
                                    @if(!$selected) 
                                        <button type='submit' class="btn btn-primary">{{translate('i_want_this', 'I want this')}}<i class='ti-heart'></i> </button>
                                    @endif
                                </div>
                                <div class='overlay'></div>
                            {!! Form::close() !!}
                        </div>
                    </div>             
                @endforeach
                    <div class="col-sm-6"  style='opacity:0.7'>
                        <div class='theme-item'  style="background: url('/img/picture/coming_soon_theme_1.png')">
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>



<div id="metaModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">   
                <h4 class="modal-title">{{translate('manage_page_meta','Manage Page Meta')}}</h4>
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">            
                <div class='row'>
                    @foreach(getConfig('system.page_meta') as $meta)
                        <div class='col-sm-6 form-group'>
                            <p>{{translate("meta_".$meta)}}</p>
                            <input name="{{$meta}}" maxlength="100" minlength="2" type="text" value="" class="form-control meta-input" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('cancel','cancel')}}</button>
                <button class="btn btn-primary cms-action-btn" data-target="meta-input" data-action="update_meta" type="submit">{{translate('update', 'Update')}}</button>
            </div>
        </div>
    </div>
</div>



<div id="editorModal" class="modal fade" role="dialog">
    <div class="modal-dialog xl">
        <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title">{{translate('editor','Editor')}}</h4>               
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">            
                <div class='wysiwyg' id="tinyMCEEditor"></div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('done','Done')}}</button>
            </div>        
        </div>
      
    </div>
</div>



<div id="bannerModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title">{{translate('banner_management','Banner Management')}}</h4>               
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">            
                <div class='col-sm-4 hide' id="bannerDisplayTemplate" >
                    <div class='attachment-display-item '>
                        <div class='bg-img'></div>
                        <p></p>
                        <input class="attachment-uid" type="hidden" data-name="banner_attachment_document_uid[]" />
                        <input class="attachment-image-path" type="hidden" data-name="banner_attachment_document_path[]"  />
                        <button class='btn btn-link delete-attachment-button' type='button'> <i class='ti ti-close'></i> </button>
                    </div>
                </div>
                                
                <button class='btn circle-btn filemanager-btn uploader-btn ml-0' data-key='banner' data-modalkey="bannerUploader" style="height:40px;">
                    <i class='ti-plus'> </i>
                    <span>{{translate('add','Add')}}</span>
                </button>
                <div id="bannerContent" class='row'></div>               
            </div>         
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('done','Done')}}</button>
            </div>
        </div>
    </div>
</div>