<script>


    let colorPickerObj = function(name){
        return {
            template: `
                <div class="colorpicker">
                    <div class="colorpicker-saturation"><i class="colorpicker-guide"></i></div>
                    <div class="colorpicker-hue"><i class="colorpicker-guide"></i></div>
                    <div class="colorpicker-alpha">
                        <div class="colorpicker-alpha-color"></div> 
                        <i class="colorpicker-guide"></i>
                    </div>
                    <div class="colorpicker-bar">
                        <input type='text' class='form-control colorpicker-input' data-target='${name}'>
                    </div>
                </div>
            `,
            extensions: [
                {
                    name: 'swatches', // extension name to load
                    options: { // extension options
                        colors: {
                            '#000000': '#000000',
                            '#212121': '#212121',
                            '#606060': '#606060',
                            '#767676': '#767676',
                            '#B9B9B9': '#B9B9B9',
                            '#F7F7F7': '#F7F7F7',
                            '#ffffff': '#ffffff',
                            '#F23C3C': '#F23C3C',                 
                            '#F2AD3C': '#F2AD3C',                 
                            '#F0ED42': '#F0ED42',                 
                            '#3CF28B': '#3CF28B',                 
                            '#3C67F2': '#3C67F2',                 
                            '#5E3CF2': '#5E3CF2',                 
                            '#F23CA7': '#F23CA7',                 
                        },
                        namesAsValues: true
                    },
                }
            ]
        }
    };
    let codeBlocks = @json($codeBlocks);
    $(document).ready(function(){
        

        /****************************************************************

                                GENERAL SECTION 

        ****************************************************************/

        // Set no-responsive
        $("meta[name='viewport']").attr('content','width=device-width, initial-scale=0.1');


        // On toggle menu 
        $(document).on('click', '.hamburger',function(){
            $('#cmsTopNav, #cmsSideNav ,#cmsFrame').toggleClass('toggle',$(".hamburger-init").is(':checked'));
        })

        // On toggle nav link tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            setEqualHeight();
        })
        $(document).on('click','.card-header',function(){
            setEqualHeight();
        })

        // On toggle tab - nicescroll 
        $("#cmsSideNav").niceScroll();
        $("#cmsSideNav").mouseover(function() {
            $("#cmsSideNav").getNiceScroll().resize();
        });


        // On change frame size 
        $(document).on('click', '.toggle-screen',function(){
            $('.toggle-screen').removeClass('active');
            $(this).addClass('active');

            $("#cmsFrame").removeClass("mobile tablet desktop").addClass($(this).data('size'));
        })

        
        // On change font 
        $('.font-picker').fontselect().on('change', function() {
            $(this).val(this.value)
        });

        
        // On change color        
        if($('.color-picker').length){
            $.each($('.color-picker'), function(i, v){
                $(v).colorpicker(colorPickerObj($(v).attr('name'))).on('colorpickerChange colorpickerShow', function (e) {
                    $(this).css('background-color', e.color.toString());
                    $('.colorpicker-input').val( e.color.toString());
                })
            })
        }
       
        
        // On change color  input     
        var timer;
        $(document).on('keyup', '.colorpicker-input', function(){
            var code = $(this).val();
            var target = $(this).attr('data-target');
            clearTimeout(timer);
            timer = setTimeout(function() {
                $("[name='"+ target +"']").colorpicker('setValue', code);
            }, 400);
        }); 
      
        
        // On toggle switch 
        $(document).on('change','.custom-toggle',function(){
            $(this).val($(this).is(':checked'));
        })

        
        // Editor modal on close
        $('#editorModal').on('hide.bs.modal', function (e) {
            $('input.' + $("#tinyMCEEditor").attr('data-name')).val(tinyMCE.get('tinyMCEEditor').getContent())
        })
     




     
        /****************************************************************

                            FILE MANAGER & BANNER

        ****************************************************************/

     
        // On open file manager
        $(document).on('click','.filemanager-btn',function(e){
            $("#fileManager").attr('data-key' , $(this).data('modalkey'));
        })


        // On show file manager clear seleceted
        $('#fileManager').on('show.bs.modal', function (e) {
            $("#fileManager .selected").removeClass('selected');
        })


        // On select banner modal image : hightlight
        $(document).on('click','#fileManager[data-key="bannerUploader"] .tab-content img',function(e){

            $(this).toggleClass('selected');

            // Overwrite original function 
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        })


        // On insert selected image  - banner modal -  Overwrite original function   
        $(document).on('click','#insertFileBtn[data-targetuuid="banner-uid"]',function(e){

            // Check if got select image 
            if(!$('img.selected').length)
            {
                swal('',$(this).data('error'), "error");
                return false;
            }

            // Import selected image 
            $.each($('img.selected'), function(i,v){
                $("#insertFileBtn").attr('data-source',$(v).attr('src'));               
                if(target = $("#insertFileBtn").attr('data-targetsource'))         
                {            
                    $("#"+ $("#insertFileBtn").attr('data-targetuploader') + " .clear-input").val('');   
                    $("#" +$("#insertFileBtn").attr('data-targetuuid')).val($(v).attr('data-uid')); 
                    insertBannerAttachment((filename=$(v).data('filename'))?filename:'', $(v).attr('src'), $(v).attr('data-uid') );
                }       
            })

            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        })

        
        // On delete product attachment 
        $(document).on('click','.delete-attachment-button', function(){
            $(this).parentsUntil('.col-sm-4').parent().remove();
        })
        
        
        // On click banner button - open banner model 
        $(document).on('click','.banner-btn', function(){
            $("#bannerModal").attr('data-uid', $(this).data('uid'));
            $("#bannerContent").html($(".banner-content", $(this).parent()).html());
        })
        

        // Banner modal on close
        $('#bannerModal').on('hidden.bs.modal', function (e) {
            var uid = $(this).attr('data-uid');
            $("input",$("#bannerContent")).addClass('block-input-' + uid);
            $(".card[data-key='"+uid+"'] .banner-content").html($("#bannerContent").html());
            $(".card[data-key='"+uid+"'] .attachment-num").html($("#bannerModal .attachment-display-item").length - 1);
            $("#bannerContent").html('');
        })
    
        // Block Sortable 
        const bannerSortable = new Draggable.Sortable(document.querySelectorAll('#bannerContent'), {
            draggable: '.col-sm-4',
            handle : '.bg-img',
            swapAnimation: {
                duration: 200,
                easingFunction: 'ease-in-out',
                horizontal: true
            },
            plugins: [SwapAnimation.default]
        });
      

        /****************************************************************

                                DATA INSERT 

        ****************************************************************/



        // Insert data - General 
        @php($general = $layout['general'])
        @if($general)
            @foreach($general as $generalKey => $generalValue)
                $("input[name='{{$generalKey}}']").val("{{$generalValue}}").change();
                $("select[name='{{$generalKey}}']").val("{{$generalValue}}").change();
            @endforeach
        @endif
        
        // Insert data - Page Meta
        @if(isset($layout['page'][$currentPage]['meta']))
            @foreach($layout['page'][$currentPage]['meta'] as $pageKey => $pageValue)
                $("input[name='{{$pageKey}}']").val("{{$pageValue}}");
            @endforeach
        @endif

        // Insert data - Page block 
        @foreach($layout['page'][$currentPage]['code_blocks'] as $blockKey=> $block)
            var blockData = @json($block['setting']);
            @if(isset($block['block']))
                codeBlockGenerator("{{$blockKey}}", "{{$block['block']}}", blockData)
            @endif
        @endforeach 



        /****************************************************************

                              CMS ACTION SECTION 

        ****************************************************************/


        // On click CMS Action button 
        $(document).on('click', '.cms-action-btn',function(){
            
            // Show Loader 
            showLoader();

            // Generate form data 
            let formSubmit = true, formRefresh = false, callbackAction = null;
            let formData = {_token: CSRF_TOKEN, action: $(this).data('action')};

            // Get form data from action target
            if($(this).data('target')){
                $.each($("." + $(this).data('target')), function(i, obj){
                    if ($(obj).attr('name').indexOf("[]") >= 0)
                    {
                        if(! formData[$(obj).attr('name').slice(0,-2)])
                            formData[$(obj).attr('name').slice(0,-2)] = [];
                        formData[$(obj).attr('name').slice(0,-2)].push($(obj).val())
                    }
                        
                    else 
                        formData[$(obj).attr('name')]  = $(obj).val()
                });
            }

            // Process action based on action type 
            switch($(this).data('action')){

                // Update general setting
                case "general_setting" :
                    $.each(['desktop','favicon','mobile'], function(i,v){
                        formData[v + "_document_uid"] = $('input[name="'+v+'_document_uid"]').val();
                        formData[v + "_document_path"] =  $('input[name="'+v+'_document_path"]').val();
                    })                    
                    break;

                // Edit page 
                case "edit_page" :
                    if(formData.pageID == "{{$currentPage}}")
                    {
                        formRefresh= true;
                        $("#pageName").html(formData.name); 
                        $("#metaCollapse input[name='name']").val(formData.name); 
                    }
                    break;

                // Update page meta 
                case "update_meta" :
                    formData.pageID = "{{$currentPage}}";
                    break;

                // Add page
                case "add_page" :

                    // Clean data
                    $('.cms-add-input').val('');
                    formData.pageID = generateUniqueID();

                    // Clear new page record on success
                    callbackAction = {'action':'add_page', 'pageID': formData.pageID, 'pageName': formData.name };
                   
                    break;

                // Delete page
                case "delete_page" :
                    formSubmit = false;
                    if(formData.pageID == "{{$currentPage}}") formRefresh = true;
                    confirmationAlert(function(e){
                        if(e) 
                        {
                            CMSAction(formData, formRefresh);
                            $(".pages-item input[name='pageID'][value='"+formData.pageID+"']").parent().parent().remove();
                        }
                        hideLoader();
                    },
                        "{{translate('delete_page_warning','Are you sure you want to delete this page? This action cannot be undo.')}}",
                        "{{translate('delete_page','Delete Page')}}"
                    )
                    break;

   

                // Publish page
                case "publish" :
                    formSubmit = false;
                    confirmationAlert(function(e){
                        if(e) CMSAction(formData);
                        hideLoader();
                    },                       
                        "{{translate('publish_page_warning','Are you sure you want to update this page to production? This action cannot be undo.')}}",
                        "{{translate('publish_page','Publish Page')}}"
                    )
                    break;


                // Reset page
                case "reset" :
                    formSubmit = false;
                    confirmationAlert(function(e){
                        if(e) CMSAction(formData, true);
                        hideLoader();
                    },                       
                        "{{translate('reset_page_warning','Are you sure you want to reset current update? This action cannot be undo.')}}",
                        "{{translate('reset_page','Reset Page')}}"
                    )
                    break;


                // Delete block
                case "delete_block" :
                    formSubmit = false;
                    var parent = $(this).parentsUntil(".card").parent();
                    confirmationAlert(function(e){

                        if(e) {

                            // Check if delete block on store page
                            if("{{$currentPage}}" == "store")
                            {
                                if($(parent).data('sub') == "collection")
                                    swal('{{translate("attention","Attention")}}','{{translate("store_page_collection_desc","Store page must have at least one All Collection page block.")}}','info');
                            }

                            // Get data and submit CMS action form 
                            formData.pageID = "{{$currentPage}}";
                            formData.blockKey = $(parent).data('key');
                            CMSAction(formData);

                            // Clear card
                            $(parent).remove();
                        }
                        hideLoader();
                    },
                        "{{translate('delete_code_block_warning','Are you sure you want to delete this code block? This action cannot be undo.')}}",
                        "{{translate('delete_code_block','Delete Code Block')}}"
                    )

                    break;


                // Update block
                case "update_block" :
                    $("#pageName").html(formData.name);
                    $(".cms-page-input-" + formData.pageID).val(formData.name);
                    formData.pageID = "{{$currentPage}}";
                    formData.blockKey =  $(this).parentsUntil(".card").parent().data('key');
                    break;


            }

            // Submit AJAX Form 
            if(formSubmit) CMSAction(formData, formRefresh, callbackAction);
           
        })







        /****************************************************************

                                CODE BLOCK  SECTION 

        ****************************************************************/


        // Mix it up plugin 
        var mixer = mixitup('#blockContainer', {
            selectors: { target: '.block-mix'},
        });


        // On click code block
        $(document).on('click','.block-item', function(){
            $('.block-item').removeClass('selected');
            $('#addBlock').show();
            $(this).addClass('selected');
        })


        // On double click code block 
        $(document).on('dblclick', '.block-item.selected', function(e) {
            $('#addBlock').click();
        })

        
        // On open block modal
        $('#blockModal').on('show.bs.modal', function (e) {
            $('.block-item').removeClass('selected');
            $("#blockModal .inner-loader").show();
            $('#addBlock').hide();
            setTimeout(function(){
                $("#blockModal .inner-loader").fadeOut();
                $("#blockCoverTab").click();
                mixer.filter('.mix-cover');
            },500);
        })
        $('#blockModal').on('shown.bs.modal', function (e) {
            setEqualHeight();
        })


        // On add code block
        $(document).on('click','#addBlock', function(){

            // Validate code block 
            showLoader();
            var check = validateBlock($('.block-item.selected').data('sub'));
            if(check !== null)
            {
                swal('',check, 'warning');
                hideLoader();
                return false;
            }
         
            // Submit CMS action 
            let uid = generateUniqueID();
            let formData = {
                _token: CSRF_TOKEN, 
                action: 'add_block', 
                key: uid,
                block: $('.block-item.selected').data('key'),
                pageID : "{{$currentPage}}"
            };
            $.ajax({
                url: '{{route("system.cms.action")}}',
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                success: function (response) {      
                    toast(response.message);
                    reloadIframe();
                    $("#blockModal").modal('hide');
                    codeBlockGenerator(uid, $('.block-item.selected').data('key'))            
                },
                error: function(response){
                    swal(response.responseJSON.message.title,response.responseJSON.message.message, 'warning');
                }
            });
            hideLoader();

        })


        // Block Sortable 
        const blockSortable = new Draggable.Sortable(document.querySelectorAll('#pageAccordion'), {
            draggable: '.card',
            handle : '.ti-move',
            swapAnimation: {
                duration: 200,
                easingFunction: 'ease-in-out',
                horizontal: false
            },
            plugins: [SwapAnimation.default]
        });
        blockSortable.on('sortable:stop', () => {            
            setTimeout(() => {
                var block = [];
                $('#pageAccordion .card').each(function(i, obj) {
                    block.push($(obj).attr('data-key'));
                });
                let formData = {
                    _token: CSRF_TOKEN, 
                    action: 'sort_block',
                    pageID : "{{$currentPage}}",
                    block: block
                };
                CMSAction(formData);              
            }, 100)
        })





        /****************************************************************

                                PAGE  SECTION 

        ****************************************************************/


        // Page Sortable 
        const sortable = new Draggable.Sortable(document.querySelectorAll('#pageBox'), {
            draggable: '.pages-item',
            handle : '.ti-move'    ,
            swapAnimation: {
                duration: 200,
                easingFunction: 'ease-in-out',
                horizontal: false
            },
            plugins: [SwapAnimation.default]
        });
        sortable.on('sortable:stop', () => {            
            setTimeout(() => {
                var page = [];
                $('#pageBox .pages-item').each(function(i, obj) {
                    page.push($(obj).find('[name="pageID"]').val());
                });
                let formData = {
                    _token: CSRF_TOKEN, 
                    action: 'sort_page',
                    page: page
                };
                CMSAction(formData);               
            }, 100)
        })
    


        // On click edit page 
        $(document).on('click', '.toggle-edit', function(){
            var parent = $(this).parent().parent();
            var toggle = $(this).data('toggle');
            $(parent).find('.page-button-section').toggle(!toggle);
            $(parent).find('.edit-confirm').toggle(toggle);
            $(parent).find('input[name="name"]').prop('readonly', !toggle)
        })


        // On click add page 
        $(document).on('click', '.add-page-btn', function(){
            $('.add-page-item').removeClass('hide');
            $(this).hide();
        })

    })






    /****************************************************************

                            FUNCTION  SECTION 

    ****************************************************************/



    // Function to general unique ID
    function generateUniqueID(){
        do{
            var uid = Math.floor(Math.random() * 26) + Date.now();
        } while($("#"+uid).length);

        return uid;
    }


    // Function to submit CMS action AJAX
    function CMSAction(formData, formRefresh = false, callbackAction = null){
        
        // Submit action form
        $.ajax({
            url: '{{route("system.cms.action")}}',
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            success: function (response) {      

                // Callback handling
                if(callbackAction){
                    switch(callbackAction.action){
                        case "add_page" :
                            createPageRecord(callbackAction);
                            break;
                    }
                }

                // Display message and refresh everything
                toast(response.message);
                reloadIframe();

                // Detect if form need to be refresh
                if(formRefresh) setTimeout(function(){location.reload();},500);
            },
            error: function(response){
                swal(response.responseJSON.message.title,response.responseJSON.message.message, 'warning');
            }
        });
        hideLoader();

    }



    // Function to generate code block
    function codeBlockGenerator(uid, key, data=null){


        // Add code block card
        var selectedBlock = codeBlocks[key];
        var card = $("#cardTemplate").clone().removeClass('hide').attr('data-key', uid).attr('data-sub',selectedBlock['uniqueCategory']).attr('id','');
        $('.title', card).html(selectedBlock['name']);
        $('.block-update-btn', card).attr('data-target', 'block-input-'+uid);
        $('.card-header', card).attr('data-target',"#"+uid+"Collapse");
        $('#blockCollapse', card).attr('id',uid+"Collapse");

        // Add code block setting - sub card
        if(selectedBlock['setting']){
            $.each(selectedBlock['setting'], function(hKey, header){
                var subCard =  $("#subCardTemplate").clone().removeClass('hide').attr('id','');
                $('.row-header', subCard).html(header['name']);

                // Add code block setting input 
                $.each(header, function(sKey, sub){
                    var input = $("#" + sub['type'] + "Input").clone().removeClass('hide').attr('id','');
                    var settingInput = $(input).find('.input');
                    
                    // Update template input attribute 
                    $('.input-title', input).html(sub['name'])
                    $(settingInput).attr('name',sub['key']).addClass('block-input-' + uid);

                    // Get value 
                    var currentValue = '';
                    if(typeof(sub['default'])!= "undefined")
                        currentValue = sub['default'];
                    if(data){
                        if(data[sub['key']] != "undefined") 
                            currentValue = data[sub['key']];
                    }
                    $(settingInput).val(currentValue);

                    // Input attribute based on input type 
                    switch(sub['type']){
                        case 'image' :                       
                            $.each($('.update-key', input), function(i,inputObj){
                                $(inputObj).attr('id',uid + sub['key'] + $(inputObj).attr('data-id'))
                            })
                            $.each($('.update-name', input), function(i,inputObj){
                                $(inputObj).attr('name',uid + sub['key'] + $(inputObj).attr('data-name')).addClass('block-input-' + uid)
                            })
                            $(".document-key", input).attr('name',uid + "_document_key[]").addClass('block-input-' + uid).val(sub['key']);
                            $("[data-name='_document_uid']", input).val(currentValue['uid']);
                            $("[data-name='_document_path']", input).val(currentValue['path']);
                            $("[data-id='-image-response']", input).attr('src', currentValue['img']);
                            $("[data-id='-image-name']", input).html(currentValue['name']);
                            $('.filemanager-btn',input).attr('data-key', uid + sub['key']);
                            $('.attachment-size', input).html(sub['size']);
                            break;

                        case "switch" : 
                            $('.switch', input).prop('checked',(currentValue =="true")).change();
                            break;

                        case 'color': 
                            $('.color-picker', input).colorpicker(colorPickerObj($('.color-picker', input).attr('name'))).on('colorpickerChange colorpickerShow', function (e) {
                                $(this).css('background-color', e.color.toString());
                                $('.colorpicker-input').val( e.color.toString());
                            })
                            $('.color-picker', input).css('background-color', currentValue);
                            break;

                        case 'link' :
                            $('.link-component', input).attr('href',sub['url']);
                            break;

                        case 'banner' :
                            $(".document-key", input).attr('name',uid + "_document_key").addClass('block-input-' + uid).val(sub['key']);
                            $('.banner-btn', input).attr('data-uid',uid).attr('data-key', uid + sub['key']);
                            $.each(currentValue, function(i, v){
                                $('.banner-content', input).append(insertBannerAttachment(v.name, v.path, v.uid, false, uid));
                            })
                            $('.attachment-num', input).html(currentValue.length);
                            $('.attachment-size', input).html(sub['size']);
                            break;

                        case 'editor' :
                            $("#editorModal .wysiwyg").attr('data-name','block-input-' + uid).html(currentValue);
                            break;

                        case 'category' :
                            $('.category-multiselect', input).multiselect({includeSelectAllOption:true,});
                            break;
                    }
        
                    // Condition checking 
                    if(typeof(sub['maxlength'])!= "undefined")
                        $(settingInput).attr('maxlength',sub['maxlength']);
                    if(typeof(sub['max'])!= "undefined")
                        $(settingInput).attr('max',sub['max']);
                    if(typeof(sub['min']) != "undefined")
                        $(settingInput).attr('min',sub['min']);

                    $('.sub-card-row', subCard).append(input);
                })

                $('.setting-section', card).append(subCard);
            })
        }

        // Special block setting handling 
        if(selectedBlock['type']){
            $.each(selectedBlock['type'], function(i,t){                
                switch (t){
                    case "social" :
                        var socialItem = $("#socialActionBox").clone().removeClass('col-sm-6').addClass('col-sm-12');
                        $('.setting-section', card).append(socialItem);
                        break;
                    case "no-update" :
                        $(".block-update-btn", card).hide();
                        break;
                }
            });
        }

        $("#pageAccordion").append(card);
        reloadIframe();

    }


    // Function to reload iframe 
    function reloadIframe()
    {
        $('.iframe-inpage-loader').fadeIn();
        $('#cmsIframe').attr('src', $('#cmsIframe').attr('src'));
        $('#cmsIframe').on('load', function(){
            $('.iframe-inpage-loader').fadeOut();
        });
    }


    // Function to insert attachment to banner modal
    function insertBannerAttachment(name, path, uid, isAppend=true, blockUID = null)
    {
        var template =  $("#bannerDisplayTemplate").clone().removeClass('hide');
        $(template).find('p').html(name);
        $.each($('input', template), function(i,e){
            $(e).attr('name',$(e).data('name'));
        })
        $(template).attr('id','');
        $('.attachment-uid', template).val(uid);
        $('.attachment-image-path', template).val(path);    
        if(blockUID)
        {
            $('.attachment-uid', template).addClass('block-input-' + blockUID);
            $('.attachment-image-path', template).addClass('block-input-' + blockUID);    
        }
        $('.bg-img', template).css('background',"url('"+path+"')");
        if(!isAppend) return template;
        $("#bannerContent").append(template);
    }


    // Function to validate block 
    function validateBlock(sub = null)
    {
        var err = null;
        switch(sub){
            case "editor" :
                if($("#pageAccordion div[data-sub='editor']").length >= 1)
                    err = "{{translate('editor_err_cms','One page only can have one Editor page block')}}";
                    break;
            case "collection" :
                if($("#pageAccordion div[data-sub='collection']").length >= 1)
                    err ="{{translate('collection_err_cms','One page only can have one All Collection page block')}}";
                    break;
        }
        return err;
    }



    // Function to create new page record 
    function createPageRecord(data){

        // Clone current pages item and create new item
        var pageItem = $('.pages-item.current').clone().removeClass('current');
        var currentPageSelector = 'cms-page-input-'+  $('[name="pageID"]', pageItem).val();

        // Update new item value & attribute        
        $("."+currentPageSelector, pageItem).addClass('cms-page-input-'+data.pageID).removeClass(currentPageSelector);
        $('[name="name"]', pageItem).val(data.pageName);
        $('[name="pageID"]', pageItem).val(data.pageID);
        $('.page-manage-btn', pageItem).attr('href','/system/cms?page='+data.pageID);
        $('.cms-action-btn', pageItem).attr('data-target','cms-page-input-'+data.pageID);
        $("#pageBox").append(pageItem);

    }

</script>