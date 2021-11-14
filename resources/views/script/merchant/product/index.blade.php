<script>


    // If product limit reached
    @if($overLimit)
        $(document).on('click','.create-btn, .clone-btn', function(e){
            swal("{{translate('product_limit_reached','Product Limit Reached')}}","{{translate('product_limit_desc','Please contact us to get more product limit or optimize number of product.')}}",'info');
        })
        $('.create-btn, .clone-btn').attr('data-target','')
    @endif

    $(document).ready(function(){


        /********************************** IMPORT RELATED ***********************************/



        // On upload excel file - for import
        $('#customFile').on('change',function(){            
            $(this).next('.custom-file-label').html($(this).val().replace(/.*(\/|\\)/, ''));
        })  





        /*************************** PRODUCT CREATION RELATED ********************************/


        // Initial tags input 
        $('[data-role="tags-input"]').tagsInput();


        // On change product type
        toggleProductType();
        $(document).on('change','input[name="product_type"]', function(){
            var type = $('.checkbox-tools:checked').attr('data-value');    
            $("input[name='pt']").val(type);
            toggleProductType();
        })


        // On select cover 
        $(document).on('click','.cover-button', function(){
            $(".cover").removeClass('cover');
            $("input[name='is_cover[]']").val('');
            var parent = $(this).parentsUntil('.col-sm-3').parent();
            $(parent).addClass('cover');
            $(parent).find(".attachment-cover").val("1");
        })


        // On click variation tab : toggle modal size - check stock setting
        $(document).on('click','#addModal .nav-link',function(){
            $("#addModal .modal-dialog").removeClass('xl')
        })
        $(document).on('click','#pills-variation-tab',function(){
            $("#addModal .modal-dialog").addClass('xl')
            checkVariationTable();
            stockCheck('v', "#pills-variation");         
        })

        // On click deetails tab : check stock setting
        $(document).on('click','#pills-detail-tab',function(){
            stockCheck('s', '#pills-detail');      
        });


        // On click review tab : toggle modal size , review product
        $(document).on('click','#pills-review-tab',function(){

            // Insert details 
            $("#reviewTitle").html($("input[name='name']").val());
            $("#reviewDescription").html($("input[name='description']").val());

            // Tiny MCE
            tinyMCE.get("reviewTinyMCE").setContent(tinyMCE.get("content").getContent());
            tinymce.get("reviewTinyMCE").mode.set("readonly");
            $("#reviewTinyMCE").siblings(".tox-tinymce").addClass("readonly");

            // Insert category 
            $("#reviewCategory").html('');
            $.each($("[name='category[]']").val(), function(i,v){
                $("#reviewCategory").append(`
                    <span class="badge badge-secondary">${$("#categorySelectTemplate option[value='"+v+"']").text()}</span>
                `);
            })

            // Insert variation

            // Insert attachment 

        })

        
        // On delete product attachment 
        $(document).on('click','.delete-attachment-button', function(){
            $(this).parentsUntil('.col-sm-3').parent().remove();
            if($("#attachmnetDisplayList .attachment-display-item").length == 0)
                $("#attachmentDisplaySection").slideUp();
            else {
                if(!$(".cover").length)
                {
                    var parent =  $("#attachmnetDisplayList .attachment-display-item").first().parent();
                    $(parent).addClass('cover');
                    $(parent).find(".attachment-cover").val("1");
                }
            }
        })
        

        //Add variant group
        $(document).on('click','#addVariant',function() {
            addVariationRow();
        });


        //Delete variant group
        $(document).on('click','.delete-variation-option',function() {

            // Check minimum
            var total = $("#variationBox .variant-group").length;
            if(total <= 1) {
                swal('',"{{translate('minimim_variat','Minimum 1 variant')}}","warning");
                return false;
            }

            // Remove all the tags inside
            let parent = $(this).parentsUntil('.variant-group').parent();
            $.each($(parent).find('.tags-container .badge span'), function(i , e){
                removeVariationRow("key" + $(e).parentsUntil(".variant-group").parent().index() + $(e).parent().index() + $(e).text(), false, false);
            })

            // Remove variant group
            $('#addVariant').show();
            $(this).parentsUntil('.variant-group').parent().remove();
            $('.variant-key').remove();
            updateVariationRow();

        });



        // Modal validation handling on submit
        $(document).on('click','#addModal .submit-btn' ,function(e){     
            var $myForm = $(this).closest('form');
            var err = null;
            var product_code_regex = new RegExp('^[a-zA-Z0-9]+[\w.-]?[a-zA-Z0-9]+$');
            if (!$(this).hasClass('modal-next-btn')) {   

                // Check product code pattern
                if(!$('input[name="product_code"]').length || !product_code_regex.test($('input[name="product_code"]').val()))
                    err = "{{translate('invalid_product_code_pattern','Invalid product code pattern.')}}";

                // Check if got attachemnt 
                if(!$('#attachmnetDisplayList .attachment-display-item').length)
                    err = "{{translate('please_upload_pattachmen','Please upload at least one product image.')}}";

                // Variation data validation 
                if (err === null && $('input[name="product_type"]:checked').attr('data-variation') === "true")
                    err = validateVariant();
 
                // Return error message
                if(err !== null){
                    swal('', err, 'warning');
                    e.preventDefault();
                    return false;
                }

            }
        })


        // Prevent product form press Enter submit
        $('#productForm input').keydown(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });





        /*************************** PRODUCT ACTION RELATED ********************************/




        // On click share button 
        $(document).on('click', '.share-btn', function() {
            var uid = $(this).data('uid');
            var merchantPath = "https://" + $("#merchantPath").val();
            var url = merchantPath + '/product/' + uid;

            $("#shareURL").val(url);
            $("#shareQR").val(merchantPath + "/{{Lang::getLocale()}}/product/qr/"+ uid);

            $('#shareModal .likely').attr('data-url', url) ;
            $('#shareModal .likely').attr('data-title', $(this).data('name')) ;

            likely.initiate();
        })


        // On change product action checkbox 
        $(document).on('change','.product-action',function(){
            showLoader();
            $.ajax({
                url: '/{{Lang::getLocale()}}/product/action',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN, 
                    actionID:$(this).attr('data-id'), 
                    action:$(this).attr('data-action'), 
                    checked:($(this).is(":checked"))?1:0
                },
                dataType: 'JSON',
                success: function (data) { 
                    toast(data.message);
                    hideLoader();
                }
            }); 
        });


        //Change stock
        $(document).on('change','.edit-unit',function(){
            showLoader();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'product/stock/update',
                type: 'POST',
                data: {_token: CSRF_TOKEN, id:$(this).attr('data-id') , stock:$(this).val()},
                dataType: 'JSON',
                success: function (data) {
                    swal('',"{{translate('stock_updated','Stock Updated')}}","success");
                    hideLoader();
                }
            });
        })


    })



    // Function to insert data into modal
    function dataInsert(data)
    {      

        // Clear data frst 
        $(".variant-key").remove();

        // Insert data         
        $.each(data.meta, function( index, value ) {          
            $(target + " input[name='"+index+"']").val(value);     
            if(value)
                $(target + " input[name='"+index+"']").click();                    
        });

        // Product type 
        $(".checkbox-tools[data-value='"+data.meta.pt+"']").prop('checked',true);        
        toggleProductType();

        // Attachment   
        $('#variation-table tbody, #attachmnetDisplayList').empty();
        $.each(data.attachment, function(i, v){
            insertAttachment(v.name, v.path, v.uid, v.isCover, v.img);
        })

        // Variation row
        var variation = data.variation;
        if(Object.keys(variation.key).length>0){
            $(".variant-group:eq(1), .variant-group:eq(2), .tags-container .badge").remove();
            for(i = 0; i < variation.type.length - 1; i++) { addVariationRow(); }
            $.each(variation.type, function(typeIndex, type){
                $("input[name='option_type[]']:eq("+typeIndex+")").val(type);
                var html ='';
                $.each(variation.value[typeIndex], function(valueIndex, value){
                    html +=`
                        <div class="tag badge badge-primary"><span>${value}</span><i class="tag-remove">✖</i></div>
                    `;
                })
                $('.variant-group:eq('+typeIndex+') .tags-container').prepend(html);
            });
            updateVariationRow();

            // Variation table 
            var config = @json(array_flip(getConfig('product.variable_meta')));
            $.each(variation.key, function(keyIndex, tableValue){
                $.each(tableValue, function(i,v){    
                    $("input[name='"+config[i] + "["+ keyIndex + "]" +"']").val(v);
                    $("input[type='checkbox'][name='"+config[i] + "["+ keyIndex + "]" +"']").prop('checked',(v=="1"));
                })
            });
        }

        // Reinit multiselect
        insertMultiselect(data.categoryArr);
    
    }


    // Function to toggle product method input display 
    function toggleProductType()
    {

        var variationCheck = ($('input[name="product_type"]:checked').attr('data-variation') === "true");
        $("#pills-variation-tab").toggle(variationCheck);
        $(".single-product-type").toggle((variationCheck)?false:true);
        $(".single-price, .single-weight, single-unit").attr('required',(variationCheck)?false:true);
        $("#pills-detail-tab").attr('data-next',(variationCheck)?"#pills-variation-tab":"#pills-attachment-tab");
        $('#pills-variation .isRequired').prop('required', variationCheck)

    }


    // Function to init product creation - multiselect & file uplaoder 
    function initProductCreation(){
        $('#variation-table tbody, #attachmnetDisplayList').empty();
        $(".for-checkbox-tools:eq(0)").click();
        $("#stockCheck").prop('checked',true).change();
        $(".variant-group:eq(1), .variant-group:eq(2), .tags-container .badge").remove();
        $("#attachmentDisplaySection, #variation-table").slideUp();
        $(".variant-key").remove();
        $("#addVariant").show();
        
        cleanMultiselect();
        updateVariationRow();
    }


    // Function to add variation row
    function addVariationRow(){
        // Check if exceed limit 
        var total = $("#variationBox .variant-group").length;
        if(total >= 3){
            swal('',"{{translate('reach_maximum_variant','Reach maximum variant')}}","warning");
            return false;
        }

        // Hide add variation button 
        if(total == 2)  $('#addVariant').hide();
        
        // Clone and add variation group
        var variantGroup = $("#variationBox .variant-group:first").clone();
        variantGroup.find('input').each(function(){this.value = ""});
        $(variantGroup).find('.tags-container .badge ').remove();
        $('#variationBox .variation-section').append(variantGroup);

        // Reinit tag input
        $('[data-role="tags-input"]').tagsInput();
    }


    // Custom Modal data validation - refer to script > index for modal action 
    function modalValidation(modal){
            
        // Standard Data validaiton     
        var activeTab = $(modal).find('.tab-pane.active');
        let allAreFilled = true, customError = true;
        $(activeTab)[0].querySelectorAll("[required]").forEach(function(i) {
            if (!allAreFilled) return;
            if (!i.value) allAreFilled = false;
            if (i.type === "radio") {
            let radioValueCheck = false;
            $(activeTab)[0].querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
                if (r.checked) radioValueCheck = true;
            })
            allAreFilled = radioValueCheck;
            }
        })    

        // Variation data validation 
        if($("#pills-variation-tab").hasClass('active'))
        {
            checkVariant = validateVariant();
            if(checkVariant !== null) {
                swal('', checkVariant, 'warning');
                customError = false;
            }
        }

        // Return validation result 
        if(!customError)  return die();   // Cause error to stop function continue running 
        return allAreFilled;

    }


    // Function to validate variant 
    function validateVariant(){

        // Validate variant row
        var err = null;
        if(!$('#variation-table tbody tr').length)
            err =  "{{translate('at_least_1_var','Please insert at least 1 variant. ')}}";

        // Variation option data validation 
        $.each($('.tags-container'), function(i, obj){
            if(!$('.badge', obj).length)                
                err =  "{{translate('insert_v_option','Please insert variant option. Press Enter after insert option value. ')}}";
        })

        // Check variation input validation 
        var vTranslate = {'vweight':"{{translate('weight')}}",'vstock_unit':"{{translate('unit')}}",'vprice':"{{translate('price')}}",'vlength':"{{translate('length')}}",'vwidth':"{{translate('width')}}",'vheight':"{{translate('height')}}"}        
        $.each($('.vlengthinput, .vwidthinput, .vheightinput, .vweightinput, .vpriceinput, .vstock_unitinput'), function(i,v){
            var verr = null; vvar = $(v).val(); name = $(v).attr('data-name');
            if(!$.isNumeric(vvar)) err = vTranslate[name] + " {{translate('numeric_err','field must be numeric')}}";
            switch(name){
                case "vprice":
                    if(vvar < 0.01)  err = vTranslate[name] + " {{translate('min_vprice_err','cannot less than RM 0.01')}}";
                    if(vvar > 99999.99)  err = vTranslate[name] + " {{translate('max_vprice_err','cannot more than RM 99999.99')}}";
                    break;
                case "vstock_unit":
                    if(vvar < 0)  err = vTranslate[name] + " {{translate('min_vunit_err','cannot less than 0')}}";
                    if(vvar > 999999)  err = vTranslate[name] + " {{translate('max_vunit_err','cannot more than 999999')}}";
                    if(vvar % 1 != 0)  err = vTranslate[name] + " {{translate('integer_err','field must be integer')}}";
                    break;
                case "vweight":
                    if(vvar < 0.001)  err = vTranslate[name] + " {{translate('min_vweight_err','cannot less than 0.001')}}";
                    if(vvar > 9999.999)  err = vTranslate[name] + " {{translate('max_vweight_err','cannot more than 9999.999')}}";
                    break;
                default:
                    if(vvar < 0.01)  err = vTranslate[name] + " {{translate('min_v_err','cannot less than 0.01')}}";
                    if(vvar > 9999.99)  err = vTranslate[name] + " {{translate('max_v_err','cannot more than 9999.99')}}";
                    break;
            }
        })     

        return err;
    }


    //Function to toggle stock input 
    function stockCheck(type, id)
    {
        // Check product type & stock check 
        var stockCheck = $('#stockCheck').is(":checked");
        if($("input[name='pt']").val() != type) stockCheck = false;

        // Toggle stock input
        $(id + " .stock-input").toggle(stockCheck);
        $(id + ' .stock-input input').prop('required', stockCheck);
    }



</script>