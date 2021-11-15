<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open(['route' => 'product.update', 'id'=>'productForm']) !!}
            <input type='hidden' name='{{$metaConfig["product_type"]}}' value='s' />
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <input type='hidden' name='editID' id='editID' />
                <input type='hidden' name='mode' id="modeID" />
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-info-tab" data-tab="active" data-type="next" data-next="#pills-detail-tab" data-toggle="pill" href="#pills-info">{{translate('info','Info')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-detail-tab" data-type="next" data-next="#pills-attachment-tab" data-toggle="pill" href="#pills-detail">{{translate('details','Detail')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-variation-tab" data-type="next" data-next="#pills-attachment-tab" data-toggle="pill" href="#pills-variation">{{translate('variant','Variant')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-attachment-tab" data-type="submit" data-toggle="pill" href="#pills-attachment">{{translate('attachment','Attachment')}}</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-review-tab" data-type="submit" data-toggle="pill" href="#pills-review">{{translate('review','Review')}}</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active " id="pills-info">
                        <div class='row'>
                            <div class="col-12 form-group">
                                <p>{{translate('product_type','Product Type')}}</p>
                                <div class="custom-checkbox-section over-hide z-bigger">
                                    <div class="container pb-5 pt-2">
                                        <div class="row justify-content-center">
                                            <div class="checkbox-flex">
                                                <input class="checkbox-tools" type="radio" name="product_type" id="tool-1" data-value='s' data-variation=false checked>
                                                <label class="for-checkbox-tools" for="tool-1">
                                                    <i class='ti-layout-width-full'></i>
                                                    {{translate('simple_product','Simple Product')}}
                                                    <small> {{translate('simple_product_explain','Base product without any variation.')}}</small>
                                                </label>
                                                <input class="checkbox-tools" type="radio" name="product_type" data-value='v' id="tool-2" data-variation=true>
                                                <label class="for-checkbox-tools" for="tool-2">
                                                    <i class='ti-layout-grid3'></i>
                                                    {{translate('variable_product','Variable Product')}}
                                                    <small> {{translate('variable_product_explain','Base product with customizable variation.')}}</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p class='required'>{{translate('product_code_u','Product Code (Must be Unique)')}} </p>
                                <input type="text" class="form-control" name="product_code" placeholder="{{translate('product_code_placeholder','Ex : KoreanCozyPant')}}" maxlength="20" required>
                            </div>
                            <div class='col-sm-6 form-group'>
                                <p class='required'>{{translate('product_name','Product Name')}} </p>
                                <input type="text" class="form-control" name="name" placeholder="{{translate('product_name_place','Enter your product name')}}" maxlength="50" required>
                            </div>
                            <div class='col-12 form-group'>
                                <p>{{translate('product_short_desc','Product Short Description')}} </p>
                                <input type="text" class="form-control" name="description" placeholder="{{translate('p_description_place','Briefly describe about your product ')}}" maxlength="190">
                            </div>
                            
                            <div class="form-group col-12">
                                <p>{{translate('product_category','Product Category')}}</p>
                                @include('component.multiselect',['data'=>$categoryArr, 'key'=>'category'])
                            </div>
                            <div class="form-group col-12">
                                <hr/>
                            </div>
                            <div class='col-sm-6 form-group'>
                                <div class="checkbox-section">
                                    <p class='title'>{{translate('product_stock','Product Stock')}}</p>
                                    <p>{{translate('product_stock_desc','Product Stock')}}</p>                                  
                                    <input type="checkbox" class="switch custom-toggle " id="stockCheck" value='1' name='{{$metaConfig["stock_check"]}}' checked>
                                </div>
                            </div>
                            <div class='col-sm-6 form-group'>
                                <div class="checkbox-section">
                                    <p class='title'>{{translate('pre_order','Pre Order')}}</p>
                                    <p>{{translate('pre_order_desc','Pre Order description')}}</p>
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='{{$metaConfig["preorder"]}}'>
                                </div>
                            </div>
                            <div class='col-sm-6 form-group'>
                                <div class="checkbox-section">
                                    <p class='title'>{{translate('featured','Featured')}}</p>
                                    <p>{{translate('featured_desc','Featured description')}}</p>
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='{{$metaConfig["featured"]}}'>
                                </div>
                            </div>
                            <div class='col-sm-6 form-group'>
                                <div class="checkbox-section">
                                    <p class='title'>{{translate('new_arrived','New Arrived')}}</p>
                                    <p>{{translate('new_arrived_desc','New Arrived description')}}</p>
                                    <input type="checkbox" class="switch custom-toggle" value='1' name='{{$metaConfig["new_arrived"]}}'>
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <div class="tab-pane fade" id="pills-detail">
                        <div class='row'>
                            <div class='col-sm-6 form-group single-product-type'>
                                <p class='required'>{{translate('product_price','Product Price')}} (RM) </p>
                                <input type="number" class="form-control single-price" name='{{$metaConfig["simple_price"]}}' placeholder="{{translate('product_price_desc','Enter your product selling price')}}" max="999999" val='1' step=0.01 min="0" required>
                            </div>
                            <div class='col-sm-6 form-group single-product-type'>
                                <p class='required'>{{translate('weight','Weight')}} (KG) </p>
                                <input type="number" class="form-control single-weight" name='{{$metaConfig["simple_weight"]}}'  max="999999" step='0.001' placeholder="{{translate('product_weight_desc','Enter your product weight in KG')}}" val='0' min="0" required>
                            </div>                                                      
                            <div class='col-sm-6 form-group single-product-type stock-input'>
                                <p class='required'>{{translate('stock','Stock')}} </p>
                                <input type="number" class="form-control single-unit" name='unit'  max="999999" step=1 placeholder="{{translate('product_stock_desc','Enter your product available stock')}}" val='0' min="0">
                            </div>                                                 
                        </div>
                        <div class='row'>
                            <div class='col-12 form-group long-section'>
                                <p>{{translate('content','Content')}} </p>
                                <div class='wysiwyg' id="content">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-attachment">
                        <div class='row'>
                            <div class="col-12 form-group">
                                <p class='required title'>{{translate('product_attachments','Product Attachment')}}</p>
                                <p>{{translate('product_attachments_desc','You can upload multiple product attachment image or video, then select the cover.')}}</p>
                                <p> </p>
                                @include('component.upload_box',['key'=>'attachment', 'multiple'=>true])
                            </div>
                            <div class='col-sm-3' id="attachmentDisplayTemplate" >
                                <div class='attachment-display-item hide'>
                                    <div class='bg-img'></div>
                                    <p></p>
                                    <span> {{translate('cover','Cover')}} </span>
                                    <input class="attachment-cover" type="hidden" data-name="is_cover[]" />
                                    <input class="attachment-uid" type="hidden" data-name="attachment_document_uid[]" />
                                    <input class="attachment-image-path" type="hidden" data-name="attachment_document_path[]"  />
                                    <button class='btn btn-link delete-attachment-button' type='button'> <i class='ti ti-close'></i> </button>
                                    <button class='btn btn-default cover-button'  type='button'>{{translate('select_as_cover','Select as Cover')}} </button>
                                </div>
                            </div>
                            <div class="col-12 form-group" id="attachmentDisplaySection">
                                <p> {{translate('uploaded_attachment','Uploaded attachment')}} </p>
                               
                                <div class='row'  id="attachmnetDisplayList">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-variation">
                        <div class='row'>
                        <div class="col-12 form-group">
                                <p class='title'>{{translate('product_variant','Product Variant')}}</p>
                                <p>{{translate('product_variation_desc','You can add maximum 3 variant option type.')}}</p>
                            </div>
                        </div>
                        <div id="variationBox">
                            <div class='variation-section'>
                                <div class='row variant-group'>
                                    <div class='col-sm-3 form-group'>
                                        <p class='required'>{{translate('option_type','Option Type')}} </p>
                                        <input type='text' class='form-control isRequired' name='option_type[]' placeholder="{{translate('voption_type_placeholder','Ex : Color')}}" >
                                    </div>
                                    <div class='col-sm-8 form-group'>
                                        <p  class='required'>{{translate('option_value','Option Value')}} </p>
                                        <input type='text' class='form-control'  data-role='tags-input' placeholder="{{translate('voption_value_placeholder','Ex : Red, Blue')}}">
                                        <small>{{translate('var_enter','Press Enter to insert new value')}}</small>
                                    </div>
                                    <div class='col-sm-1 form-group d-flex'>
                                        <button class='btn btn-link delete-variation-option' type='button'><i class='ti ti-trash'></i> </button>
                                    </div>
                                </div>
                            </div>
                            <button type='button' id="addVariant" class='btn btn-default'>{{translate('add_variant','Add Variant')}}</button>
                        </div>
                        <table id="variation-table" class="table">
                            <thead class='thead-none'>
                                <tr>
                                    <th scope="col" style="width:25%">{{translate('variant','Variant')}}</th>
                                    <th scope="col" class='required'>{{translate('price','Price')}} (RM)</th>
                                    <th scope="col">{{translate('width','Width')}}</th>
                                    <th scope="col">{{translate('length','Length')}}</th>
                                    <th scope="col">{{translate('height','Height')}}</th>
                                    <th scope="col" class='required'>{{translate('weight','Weight')}} (KG)</th>
                                    <th scope="col" class='stock-input required'>{{translate('stock_unit','Stock Unit')}}</th>
                                    <th scope="col">{{translate('enable','Enable')}}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-review">
                        <div class='row'>
                            <div class='col-lg-6 col-sm-12'>
                                <div id='reviewImage'></div>
                            </div>
                            <div class="col-lg-1 col-sm-12"></div>
                            <div class='col-lg-5 col-sm-12'>
                                <div id="reviewContent">
                                    <div id="reviewCategory"></div>
                                    <h1 id="reviewTitle"></h1>
                                    <p id="reviewDescription"></p>
                                    <p id="reviewPrice"></p>
                                    <div class="row">
                                        <div class="col-6">
                                            <label> 数量 </label>
                                            <input type="number" class="form-control quantity-input">
                                        </div>
                                    </div>                          
                                    <div class="product-button-section"> 
                                        <button class="btn btn-primary">{{translate('purchase_now','Purchase Now')}} </button>
                                        <button class="btn btn-secondary">{{translate('add_to_cart','Add to Cart')}} </button>
                                    </div>
                                </div>
                            </div>
                            <div class='col-12'>
                                <div class='wysiwyg' id="reviewTinyMCE">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary-light submit-btn edit-show create-show">{{translate('create','Create')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>



<div id="importExcel" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'product.import.wizard','files'=>'true']) !!}
            <div class="modal-header">
                <h4 class="modal-title"> {{translate('import_product','Import Product')}}</h4>
            </div>
            <div class="modal-body row">
                <div class='col-sm-12 form-group'>
                    <a href='/product/import/wizard'>
                        <button class='btn btn-default wizard-btn ' type='button'>
                            <i class='ti-wand'> </i>{{translate('import_wizard','Import Wizard')}}
                            <span>{{translate('quick_import_tool','Quick import tool')}}</span>
                        </button>
                    </a>
                </div>
                <div class='col-sm-12 form-group'>
                    <div class='or-box'>
                        <h1> {{translate('or','or')}} </h1>
                        <div class='or-line'></div>
                    </div>
                </div>
                <div class='col-sm-12 form-group'>
                    <p class='title'> {{translate('import_excel','Import Excel ')}} </p>
                    <p class='subtitle'> {{translate('step_1','Step 1')}}</p>
                    <span class='subtitle-content'> {{translate('download_sample','Download sample excel file below')}} </span>
                    <a href='/sample/import_product_sample.xlsx' class='no-loader' ><button type='button' class='btn btn-default'> {{translate('sample','Sample')}} </button> </a>
                    <p class='subtitle'> {{translate('step_2','Step 2')}}</p>
                    <span class='subtitle-content'> {{translate('modify_upload_excel','Modify excel file content then upload the excel file')}} </span>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name='import' id="customFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('dash_card_close','Close')}}</button>
                <button class="btn btn-primary">{{translate('import','Import')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>



<div id="shareModal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">            
                <div class='container'>
                    <div class='feedback-form'>
                        <input type='hidden' id="merchantPath" value="{{getMerchant()->getPrimaryDomain()}}"/>
                        <h1>{{translate('share_product','Share Product')}}. </h1>
                        <div class='feedback-message'>
                            <div class="form-group row">
                                <div class="form-group col-12">
                                    <p>{{translate('product_link','Product Link')}}</p>
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" id="shareURL" readonly>
                                        <div class="input-group-append">
                                            <button class="btn copy-btn" type="button" data-target="shareURL"><i class='ti-clipboard'></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <p>{{translate('qr_code','QR Code')}}</p>
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" id="shareQR" readonly>
                                        <div class="input-group-append">
                                            <button class="btn copy-btn" type="button" data-target="shareQR"><i class='ti-clipboard'></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <div class="likely">
                                        <div class="facebook"></div>
                                        <div class="twitter"></div>
                                        <div class="telegram"></div>
                                        <div class="whatsapp"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </div>
</div>
